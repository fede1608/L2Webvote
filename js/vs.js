$(document).ready(function () {
    $("span#chars").toggle(
        function () {
            $("div#oculto").slideDown("fast");
        },
        function () {
            $("div#oculto").slideUp("fast");
        }
    );
    $("span#sai").toggle(
        function () {
            $("div#sair").slideDown("fast");
        },
        function () {
            $("div#sair").slideUp("fast");
        }
    );
    $("span#pn").toggle(
        function () {
            $("div#basic").slideDown("fast");
        },
        function () {
            $("div#basic").slideUp("fast");
        }
    );
    $("a#close").click(function () {
        $("div#results").slideUp("fast");
    });
    $('#VoteLinks').find('a').addClass('noVote').click(function () {
        var voteEl = this;
        if ($(this).hasClass('noVote') || $(this).hasClass('doneVote')) {
            alert('Você ainda não votou no servidor.');
            return false;
        } else {
            $(voteEl).find('img').css('border-color', '#FF6600');
            setTimeout(function () {
                if ($('#VoteLinks').find('.noVote').length > 0) {
                    $('#VoteLinks').find('.noVote:first').removeClass('noVote').find('img').fadeTo('slow', 1);
                    if ($('#VoteLinks').find('.noVote').length <= 0) {
                        $('#VoteLinks').find('#mostrabtn').html('<input type="submit" value="Votar" name="votar" id="votar" />');
                    }
                }
                $(voteEl).addClass('doneVote').find('img').css('border-color', '#74C200');
            }, 10000);
            return true;
        }
    }).find('img').fadeTo(0, 0.3);
    $('#VoteLinks').find('a:first').removeClass('noVote').find('img').fadeTo('slow', 1);
});
function help(txt) {
    document.getElementById('help').innerHTML = txt;
}
function abre(url) {
    window.open(url, '_blank');
    return false;
}
function sair(form, user) {
    return confirm(user + ", deseja mesmo sair?");
}