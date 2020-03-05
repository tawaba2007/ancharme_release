(function () {
    var elem = document.getElementsByTagName('body');
    var navigationList = document.getElementById('navigation-list');
    var listItem = navigationList.children;

    for (var i = 0; i < listItem.length; i++) {
        if (elem[0].classList.contains(listItem[i].getAttribute('data-pagename'))) {
            listItem[i].classList.add('is-active');
        }
    }

}());