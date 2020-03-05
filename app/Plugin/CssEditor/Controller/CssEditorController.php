<?php
/*
  * This file is part of the CssEditor plugin
  *
  * Copyright (C) >=2017 lecast system.
  * @author Tetsuji Shiro 
  *
  * このプラグインは再販売禁止です。
  */

namespace Plugin\CssEditor\Controller;

use Eccube\Application;
use Eccube\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Filesystem\Filesystem;

use Plugin\CssEditor\Entity\CssEditor;

/**
 * Class CssEditorController.
 */
class CssEditorController extends AbstractController
{
    /**
     * おすすめ商品一覧.
     *
     * @param Application $app
     * @param Request     $request
     *
     * @return Response
     */
    public function index(Application $app, Request $request)
    {
        $view_file = $request->query->get('f') ?: 'style.css';
        $history_id = $request->query->get('h') ?: null;
        $history = [];
        if ($view_file) {
            $history_list = $app['eccube.plugin.repository.css_history']->findBy(['file_name' => $view_file]);
        }else{
            $history_list = $app['eccube.plugin.repository.css_history']->findAll();

        }
        $form = $app['form.factory']
            ->createBuilder('admin_CssEditor')
            ->getForm();
        
        $form->handleRequest($request);

        $path = $app['config']['template_html_realdir']. '/css';
        $finder = new Finder();
        $finder->files()->in($path);
        $contents = '';
        

        $files = $finder->files()->name('*.css');
        $file_names = [];
        foreach($files as $file){
            $file_names[] = $file->getRelativePathname();
            if($file->getRelativePathname() == $view_file){
                $contents = $file->getContents();
            }
        }
        if(!empty($history_id)){
            $data = $app['eccube.plugin.repository.css_history']->find($history_id);
            $finder = new Finder();
            $path = $app['config']['plugin_temp_realdir']. '/history/';
            $finder->files()->in($path);
            $date = $data->getCreated()->format('YmdHis');
            $files = $finder->files()->name($date. '-'. $view_file);
            foreach($files as $file){
                $contents = $file->getContents();
            }
            
        }
        
        $form->get('css')->setData($contents);
        return $app->render('CssEditor/Resource/template/admin/index.twig', array(
            'form' => $form->createView(),
            'dir' => $path,
            'css' => $contents,
            'view_file' => $view_file,
            'files' => $file_names,
            'pagination' => $history_list,
            'total_item_count' => count($history_list),
        ));
    }

    public function delete(Application $app, Request $request, $id)
    {
        // Id valid
        if (!$id) {
            return $app->redirect($app->url('admin_CssEditor'));
        }

        $em = $app['eccube.plugin.repository.css_history'];
        $post = $em->find($id);
        if (!$post) {
            throw new NotFoundHttpException('データがありません');
        }
        
        $path = $app['config']['plugin_temp_realdir']. '/history/';
        $file_name = $post->getFileName();
        $date = $post->getCreated()->format('YmdHis');
        if(unlink($path. $date. '-'. $file_name)){
            $app['orm.em']->remove($post);
            $app['orm.em']->flush();
            $app->addSuccess('ファイルを削除しました', 'admin');
        }else{
            $app->addError('履歴の削除に失敗しました', 'admin');
        }
        return $app->redirect($app->url('admin_CssEditor'));
    }

    public function update(Application $app, Request $request)
    {
        if (!'POST' === $request->getMethod()) {
            log_error('Delete with bad method!');
            throw new BadRequestHttpException();
        }
        $form = $app['form.factory']
            ->createBuilder('admin_CssEditor')
            ->getForm();
        
        $form->handleRequest($request);
        $data = $form->getData();

        if(empty($data['file_name']) || empty($data['css'])){
            $app->addError('データがありません', 'admin');
        }else{
            $path = $app['config']['template_html_realdir']. '/css';
            $file_name = $path. '/'. $data['file_name'];

            if(!file_put_contents($file_name, $data['css'])){
                $app->addError('書き込みに失敗しました', 'admin');
                return $app->redirect($app->url('admin_CssEditor'). '?f='. $data['file_name']);
            }
            // 履歴に保存
            if($data['is_history']){
                $datetime = date('YmdHis');
                $path = $app['config']['plugin_temp_realdir']. '/history/';
                try{
                    if(!file_exists($path)){
                        $fs = new Filesystem();
                        $fs->mkdir($path, 0777);
                    }
                    $file_path = $path. $datetime. '-'.$data['file_name'];
                    if(file_put_contents($file_path, $data['css'])){
                        $this->save($app, $data['file_name'], $data['text'], $datetime);
                    }
                } catch (Exception $e){
                    $app->addError('履歴の保存に失敗しました', 'admin');
                    return $app->redirect($app->url('admin_CssEditor'). '?f='. $data['file_name']);
                }
            }
            $app->addSuccess('ファイルを更新しました', 'admin');
        }
        
        return $app->redirect($app->url('admin_CssEditor'). '?f='. $data['file_name']);
    }

    /*
     * 履歴を保存
     * 
     * @param String $file_name
     * @param String $text
     * aH$0fboKSgRc#g7&GiazrLZG
     * @return Boolean
     */
    public function save($app, $file_name, $text, $datetime)
    {
        try{
            $ent = new CssEditor();
            $ent->setFileName($file_name);
            $ent->setCreated(new \DateTime($datetime));
            $ent->setText($text);

            $app['orm.em']->persist($ent);
            $app['orm.em']->flush($ent);
        }catch(Exception $e){
            return false;
        }
        
        return true;
    }


}
