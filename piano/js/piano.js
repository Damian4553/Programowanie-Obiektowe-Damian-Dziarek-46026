function playNode(Node) {
    var node = new Audio("Music/" + Node + ".mp3");
    node.play();
}

$(document).ready(function () {

    $('.tile').on('click', function () {
        let $idNode = $(this).attr('id');
        let node = new Audio("Music/" + $idNode + ".mp3")
        node.play();
    })

})