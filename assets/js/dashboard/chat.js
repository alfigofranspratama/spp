
$('.message-search-area > input').on('keyup', function() {
  var rex = new RegExp($(this).val(), 'i');
    $('.message-bx .chat-list-area').hide();
    $('.message-bx .chat-list-area').filter(function() {
        return rex.test($(this).text());
    }).show();
});

$('.chat-list-area').on('click', function(event) {
    if ($(this).hasClass('.active')) {
        return false;
    } else {
        var findChat = $(this).attr('data-chat');
        var personName = $(this).find('.user-name').text();
        var personImage = $(this).find('img').attr('src');

        if (window.innerWidth <= 767) {
          $('.chat-list-area .name').html(personName.split(' ')[0]);
        } else if (window.innerWidth > 767) {
          $('.chat-box-header .title-nm').html(personName);
        }
        $('.chat-box-header .main-img').attr('src', personImage);
        $('.chat-box-area .received-msg img').attr('src', personImage);
		$('.chat').removeClass('active-chat');
        $('.chat-list-area').removeClass('active');
        $(this).addClass('active');
		$('.chat[data-chat = '+findChat+']').addClass('active-chat');
    }
});


$('.type-massage .form-control').on('keydown', function(event) {
    if(event.key === 'Enter') {
        var chatInput = $(this);
        var chatMessageValue = chatInput.val();
        if (chatMessageValue === '') { return; }
        $messageHtml = '<div class="media mb-4 justify-content-end align-items-end">'+
							'<div class="message-sent">'+
								'<p class="mb-1">'+
									chatMessageValue+
								'</p>'+
								'<span class="fs-12 text-black">9.30 AM</span>'+
							'</div>'+
							'<div class="image-bx ml-sm-3 ml-2 mb-4">'+
								'<img src="images/profile/pic1.jpg" alt="" class="rounded-circle img-1">'+
							'</div>'+
						'</div>';
        var appendMessage = $(this).parents().find('.active-chat').append($messageHtml);
		const getScrollContainer = document.querySelector('.chat-box-area');
        getScrollContainer.scrollTop = getScrollContainer.scrollHeight;
        var clearChatInput = chatInput.val('');
    }
})