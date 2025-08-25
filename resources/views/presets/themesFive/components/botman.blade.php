

 <style>
     .chatbot {
         position: fixed;
         top: 0;
         bottom: 0;

         {{-- bottom: 20px; --}} {{-- right: 20px; --}} {{-- width: 300px; --}} z-index: 1000;
     }
 
      @media (max-width: 767px) {
          .chatbot
          {
              max-width: 330px;
             right: 5px;
             margin-top:50%;
          }
     
 }
     @media screen and (min-width: 640px) {
         .chatbot {
             max-width: 330px;
             right: 55px;
             top: auto;
         }
     }

     .chatbot.chatbot--closed {
         top: auto;
         bottom: 15px;
         
     }

     .chatbot__header {
         color: #000;
         display: flex;
         align-items: center;
         justify-content: space-between;
         height: 50px;
         padding: 0 10px;
         width: 100%;
         cursor: pointer;
         transition: background-color 0.2s ease;
         border-radius: 3%;
     }

     .chatbot__close-button {
         fill: #fff;
     }

     .chatbot__close-button.icon-speech {
         width: 20px;
         display: none;
     }

     .chatbot--closed .chatbot__close-button.icon-speech {
         display: block;
     }

     .chatbot__close-button.icon-close {
         width: 14px;
     }

     .chatbot--closed .chatbot__close-button.icon-close {
         display: none;
     }

     .chatbot__message-window {
         height: calc(100% - (54px + 60px));
         padding: 10px 10px 10px;
         background-color: #fff;
         overflow-x: none;
         overflow-y: auto;
     }

     @media screen and (min-width: 640px) {
         .chatbot__message-window {
             height: 330px;
         }
     }

     .chatbot__message-window::-webkit-scrollbar {
         display: none;
     }

     .chatbot--closed .chatbot__message-window {
         display: none;
     }

     .chatbot__messages {
         padding: 0;
         margin: 0;
         list-style: none;
         display: flex;
         flex-direction: column;
         width: auto;
     }

     .chatbot__messages li {
         margin-bottom: 20px;
     }

     .chatbot__messages li.is-ai {
         display: inline-flex;
         align-items: flex-start;
     }

     .chatbot__messages li.is-user {
         text-align: right;
         display: inline-flex;
         align-self: flex-end;
     }

     .chatbot__messages li .is-ai__profile-picture {
         margin-right: 8px;
     }

     .chatbot__messages li .is-ai__profile-picture .icon-avatar {
         width: 40px;
         height: 40px;
         padding-top: 6px;
     }

     .chatbot__message {
         display: inline-block;
         padding: 12px 20px;
         word-break: break-word;
         margin: 0;
         border-radius: 6px;
         letter-spacing: -0.01em;
         line-height: 1.45;
         overflow: hidden;
     }

     .is-ai .chatbot__message {
         background-color: #f0f0f0;
         margin-right: 30px;
     }

     .is-ai .user__message {
         background-color: #f0f0f0;
         margin-left: 60px;
     }

     .user__message {
         display: inline-block;
         padding: 12px 20px;
         word-break: break-word;
         margin: 0;
         border-radius: 6px;
         letter-spacing: -0.01em;
         line-height: 1.45;
         overflow: hidden;
     }

     .is-user .chatbot__message {
         background-color: #7ee0d2;
         margin-left: 30px;
     }

     .chatbot__message a {
         color: #7226e0;
         word-break: break-all;
         display: inline-block;
     }

     .chatbot__message p:first-child {
         margin-top: 0;
     }

     .chatbot__message p:last-child {
         margin-bottom: 0;
     }

     .chatbot__message button {
         background-color: #fff;
         font-weight: 300;
         border: 2px solid #7226e0;
         border-radius: 50px;
         padding: 8px 20px;
         margin: -8px 10px 18px 0;
         transition: background-color 0.2s ease;
         cursor: pointer;
     }

     .chatbot__message button:hover {
         background-color: #f2f2f2;
     }

     .chatbot__message button:focus {
         outline: none;
     }

     .chatbot__message img {
         max-width: 100%;
     }

     .chatbot__message .card {
         background-color: #fff;
         text-decoration: none;
         overflow: hidden;
         border-radius: 6px;
         color: black;
         word-break: normal;
     }

     .chatbot__message .card .card-content {
         padding: 20px;
     }

     .chatbot__message .card .card-title {
         margin-top: 0;
     }

     .chatbot__message .card .card-button {
         color: #7226e0;
         text-decoration: underline;
     }

     .animation:last-child {
         -webkit-animation: fadein 0.25s;
         animation: fadein 0.25s;
         -webkit-animation-timing-function: all 200ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
         animation-timing-function: all 200ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
     }

     .chatbot__arrow {
         width: 0;
         height: 0;
         margin-top: 18px;
     }

     .chatbot__arrow--right {
         border-top: 6px solid transparent;
         border-bottom: 6px solid transparent;
         border-left: 6px solid #7ee0d2;
     }

     .chatbot__arrow--left {
         border-top: 6px solid transparent;
         border-bottom: 6px solid transparent;
         border-right: 6px solid #f0f0f0;
     }

     .chatbot__entry {
         display: flex;
         align-items: center;
         justify-content: space-between;
         height: 60px;
         padding: 0 20px;
         border-top: 1px solid #e6eaee;
         background-color: #fff;
     }

     .chatbot--closed .chatbot__entry {
         display: none;
     }

     .chatbot__input {
         height: 100%;
         width: 80%;
         border: 0;
     }

     .chatbot__input:focus {
         outline: none;
     }

     .chatbot__input::-webkit-input-placeholder {
         color: #7f7f7f;
     }

     .chatbot__input::-moz-placeholder {
         color: #7f7f7f;
     }

     .chatbot__input::-ms-input-placeholder {
         color: #7f7f7f;
     }

     .chatbot__input::-moz-placeholder {
         color: #7f7f7f;
     }

     .chatbot__submit {
         fill: #7226e0;
         height: 22px;
         width: 22px;
         transition: fill 0.2s ease;
         cursor: pointer;
     }

     .chatbot__submit:hover {
         fill: #45148c;
     }

     .u-text-highlight {
         color: #7ee0d2;
     }

     .loader {
         margin-bottom: -2px;
         text-align: center;
         opacity: 0.3;
     }

     .loader__dot {
         display: inline-block;
         vertical-align: middle;
         width: 6px;
         height: 6px;
         margin: 0 1px;
         background: black;
         border-radius: 50px;
         -webkit-animation: loader 0.45s infinite alternate;
         animation: loader 0.45s infinite alternate;
     }

     .loader__dot:nth-of-type(2) {
         -webkit-animation-delay: 0.15s;
         animation-delay: 0.15s;
     }

     .loader__dot:nth-of-type(3) {
         -webkit-animation-delay: 0.35s;
         animation-delay: 0.35s;
     }

     @-webkit-keyframes loader {
         0% {
             transform: translateY(0);
         }

         100% {
             transform: translateY(-5px);
         }
     }

     @keyframes loader {
         0% {
             transform: translateY(0);
         }

         100% {
             transform: translateY(-5px);
         }
     }

     @-webkit-keyframes fadein {
         from {
             opacity: 0;
             margin-top: 10px;
             margin-bottom: 0;
         }

         to {
             opacity: 1;
             margin-top: 0;
             margin-bottom: 10px;
         }
     }

     @keyframes fadein {
         from {
             opacity: 0;
             margin-top: 10px;
             margin-bottom: 0;
         }

         to {
             opacity: 1;
             margin-top: 0;
             margin-bottom: 10px;
         }
     }

     * {
         box-sizing: border-box;
     }

     body {
         {{-- background: url("https://images.unsplash.com/photo-1464823063530-08f10ed1a2dd?dpr=1&auto=compress,format&fit=crop&w=1199&h=799&q=80&cs=tinysrgb&crop=&bg=") no-repeat center center; --}} background-size: cover;
         {{-- height: 1000px; --}} font-family: "Open Sans", sans-serif;
         {{-- font-size: 13px; --}}
     }

     input {
         font-family: "Open Sans", sans-serif;
     }

     strong {
         font-weight: 600;
     }

     .intro {
         display: block;
         margin-bottom: 20px;
     }


     .initial-bot-msg-container{
        background:white;
        border:1px solid gray;
        width:150px;
        height:85px;
        background:var(--template-color);
        position:absolute;
        right:0px;
        bottom:90px;
        border:1px solid white;
        border-radius:10px;
        padding:10px;
        animation:magnify 0.5s ease-in-out infinite alternate;
        transition: all 0.5s ease;
        box-shadow:1px 1px 2px 0px #FFE48C;
        cursor: pointer;
        
     }


     .chatbot--closed .chatbot__header{
        display:none;
     }

     @keyframes magnify{
        from{
            transform:scale(1,1);
        }to{
            transform:scale(1.1,1.1);
        }
     }

 </style>

<div class="chatbot chatbot--closed" id="botman">

    <div class="initial-bot-msg-container">
        <i class="fa-solid fa-xmark position-absolute" style="top:0px; right:7px; color:white;"></i>
        <p class="text-light" style="line-height:25px;">Hello !! <br> I'm a Career Bee</p>
    </div>

     <div class="chatbot__icon">
         <img src="{{ asset('assets/presets/themesFive/cb.png') }}" alt=""
             style="height: 100px; border-radius: 50%;">
     </div>
      <div class="chatbot chatbot--opened" id="botman">
          <div class="chatbot__header" style="background:var(--template-color); position:relative;">
         <i class="fas fa-times chatbot__close-button icon-close" style="position:absolute; right:10px; color:white;"></i>
     </div>
     <div class="chatbot__message-window" style="overflow-y: auto; scroll-behavior: smooth;">
         <ul class="chatbot__messages" id="chatbot_messages">
             <li class="is-ai animation">
                 <div class="is-ai__profile-picture" style="margin-top: 6px;">
                     <img src="{{ asset('assets/presets/themesFive/cb.png') }}" alt=""
             style="height: 30px;width:30px; border-radius: 50%;">
                 </div>
                 <span class="chatbot__arrow chatbot__arrow--left"></span>
                 <p class='chatbot__message' style="font-size: 13px;">Hi! 🖐. I’m Career Bee. How can I assist you
                     today?</p>
             </li>
             <li class="is-ai animation type">
                 <div class="is-ai__profile-picture" style="margin-top: 6px;">
                     <img src="{{ asset('assets/presets/themesFive/cb.png') }}" alt=""
             style="height: 30px; border-radius: 50%;">
                 </div>
                 <span class="chatbot__arrow chatbot__arrow--left"></span>
                 <p class="chatbot__message" style="font-size: 13px;">Choose your Gender</p>
             </li>

             <li class="is-ai animation getgender" id="get_gender">
                 <span class="chatbot__arrow chatbot__arrow--left"></span>
                 <img src="{{ asset('assets/presets/themesFive/boy.png') }}" alt="" width="80"
                     style="border-radius: 50%" class="gender" name="boy">
                 <img src="{{ asset('assets/presets/themesFive/girl.png') }}" alt="" width="80"
                     style="border-radius: 50%" class="gender" name="girl">
             </li>
         </ul>
     </div>
     <div class="chatbot__entry chatbot--closed">
         <svg class="chatbot__submit" viewBox="0 0 32 32">
             <use xlink:href="#icon-send" />
         </svg>
         {{-- <a href="" class="btn btn-primary">Refresh</a> --}}
         <button class="btn btn-primary" id="refreshChatbot" style="margin-left: 10px; color:#ffffff">Refresh</button>
     </div>
 </div>

 <script>
     //  const accessToken = '3796899bd37c423bad3a21a25277bce0'
     //  const baseUrl = 'https://api.api.ai/api/query?v=2015091001'
     //  const sessionId = '20150910';
     //  const loader =
     //      `<span class='loader'><span class='loader__dot'></span><span class='loader__dot'></span><span class='loader__dot'></span></span>`
     //  const errorMessage =
     //      'My apologies, I\'m not avail at the moment, however, feel free to call our support team directly 0123456789.'
     //  const urlPattern = /(\b(https?|ftp):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/gim
     const $document = document
     const $chatbot = $document.querySelector('.chatbot')
     const $chatbotMessageWindow = $document.querySelector('.chatbot__message-window')
     const $chatboticon = $document.querySelector('.chatbot__icon')
     const $chatbotHeader = $document.querySelector('.chatbot__header')
     const $chatbotMessages = $document.querySelector('.chatbot__messages')
     const $chatbotInput = $document.querySelector('.chatbot__input')
     const $chatbotSubmit = $document.querySelector('.chatbot__submit')

     //  const botLoadingDelay = 1000
     //  const botReplyDelay = 2000

     document.addEventListener('keypress', event => {
         if (event.which == 13) validateMessage()
     }, false)

     $chatboticon.addEventListener('click', () => {
         toggle($chatbot, 'chatbot--closed')
         $chatbotInput.focus()
     }, false)
         $chatbotHeader.addEventListener('click', () => {
         toggle($chatbot, 'chatbot--closed')
         $chatbotInput.focus()
     }, false)

     $chatbotSubmit.addEventListener('click', () => {
         validateMessage()
     }, false)

     const toggle = (element, klass) => {
         const classes = element.className.match(/\S+/g) || [],
             index = classes.indexOf(klass)
         index >= 0 ? classes.splice(index, 1) : classes.push(klass)
         element.className = classes.join(' ')
     }

     const userMessage = content => {
         $chatbotMessages.innerHTML += `<li class='is-user animation'>
      <p class='chatbot__message'>
        ${content}
      </p>
      <span class='chatbot__arrow chatbot__arrow--right'></span>
    </li>`
     }

     const aiMessage = (content, isLoading = false, delay = 0) => {
         setTimeout(() => {
             removeLoader()
             $chatbotMessages.innerHTML += `<li
      class='is-ai animation'
      id='${isLoading ? "is-loading" : ""}'>
        <div class="is-ai__profile-picture">
          <svg class="icon-avatar" viewBox="0 0 32 32">
            <use xlink:href="#avatar" />
          </svg>
        </div>
        <span class='chatbot__arrow chatbot__arrow--left'></span>
        <div class='chatbot__message'>${content}</div>
      </li>`
             scrollDown()
         }, delay)
     }

     const removeLoader = () => {
         let loadingElem = document.getElementById('is-loading')
         if (loadingElem) $chatbotMessages.removeChild(loadingElem)
     }

     const escapeScript = unsafe => {
         const safeString = unsafe
             .replace(/</g, ' ')
             .replace(/>/g, ' ')
             .replace(/&/g, ' ')
             .replace(/"/g, ' ')
             .replace(/\\/, ' ')
             .replace(/\s+/g, ' ')
         return safeString.trim()
     }

     const linkify = inputText => {
         return inputText.replace(urlPattern, `<a href='$1' target='_blank'>$1</a>`)
     }

     const validateMessage = () => {
         const text = $chatbotInput.value
         const safeText = text ? escapeScript(text) : ''
         if (safeText.length && safeText !== ' ') {
             resetInputField()
             userMessage(safeText)
             send(safeText)
         }
         scrollDown()
         return
     }

     const multiChoiceAnswer = text => {
         const decodedText = text.replace(/zzz/g, "'")
         userMessage(decodedText)
         send(decodedText)
         scrollDown()
         return
     }

     const processResponse = val => {
         if (val && val.fulfillment) {
             let output = ''
             let messagesLength = val.fulfillment.messages.length

             for (let i = 0; i < messagesLength; i++) {
                 let message = val.fulfillment.messages[i]
                 let type = message.type

                 switch (type) {
                     // 0 fulfillment is text
                     case 0:
                         let parsedText = linkify(message.speech)
                         output += `<p>${parsedText}</p>`
                         break

                         // 1 fulfillment is card
                     case 1:
                         let imageUrl = message.imageUrl
                         let imageTitle = message.title
                         let imageSubtitle = message.subtitle
                         let button = message.buttons[0]

                         if (!imageUrl && !button && !imageTitle && !imageSubtitle) break

                         output += `
            <a class='card' href='${button.postback}' target='_blank'>
              <img src='${imageUrl}' alt='${imageTitle}' />
            <div class='card-content'>
              <h4 class='card-title'>${imageTitle}</h4>
              <p class='card-title'>${imageSubtitle}</p>
              <span class='card-button'>${button.text}</span>
            </div>
            </a>
          `
                         break

                         // 2 fulfillment is a quick reply with multi-choice buttons
                     case 2:
                         let title = message.title
                         let replies = message.replies
                         let repliesLength = replies.length
                         output += `<p>${title}</p>`

                         for (let i = 0; i < repliesLength; i++) {
                             let reply = replies[i]
                             let encodedText = reply.replace(/'/g, 'zzz')
                             output += `<button onclick='multiChoiceAnswer("${encodedText}")'>${reply}</button>`
                         }
                         break
                 }
             }

             removeLoader()
             return output
         }

         removeLoader()
         return `<p>${errorMessage}</p>`
     }

     const setResponse = (val, delay = 0) => {
         setTimeout(() => {
             aiMessage(processResponse(val))
         }, delay)
     }

     const resetInputField = () => {
         $chatbotInput.value = ''
     }

     const scrollDown = () => {
         const distanceToScroll =
             $chatbotMessageWindow.scrollHeight -
             ($chatbotMessages.lastChild.offsetHeight + 60)
         $chatbotMessageWindow.scrollTop = distanceToScroll
         return false
     }

     const send = (text = '') => {
         fetch(`${baseUrl}&query=${text}&lang=en&sessionId=${sessionId}`, {
                 method: 'GET',
                 dataType: 'json',
                 headers: {
                     Authorization: 'Bearer ' + accessToken,
                     'Content-Type': 'application/json; charset=utf-8'
                 }
             })
             .then(response => response.json())
             .then(res => {
                 if (res.status < 200 || res.status >= 300) {
                     let error = new Error(res.statusText)
                     throw error
                 }
                 return res
             })
             .then(res => {
                 setResponse(res.result, botLoadingDelay + botReplyDelay)
             })
             .catch(error => {
                 setResponse(errorMessage, botLoadingDelay + botReplyDelay)
                 resetInputField()
                 console.log(error)
             })

         aiMessage(loader, true, botLoadingDelay)
     }
 </script>
 <script>
     // Function to automatically scroll to the bottom of the chatbot message window
     function scrollToBottom() {
         const messageWindow = document.querySelector('.chatbot__message-window');
         messageWindow.scrollTop = messageWindow.scrollHeight;
     }

     // Observe the message container for any changes (new messages added)
     const messageContainer = document.getElementById('chatbot_messages');
     const observer = new MutationObserver(scrollToBottom);

     // Start observing the message container for child elements being added
     observer.observe(messageContainer, {
         childList: true
     });

     // Example function to simulate adding a new message
     function addMessage(content, isUser = false) {
         const newMessage = document.createElement('li');
         newMessage.className = isUser ? 'is-user animation' : 'is-ai animation';
         newMessage.innerHTML = `
            <div class="${isUser ? 'is-user__profile-picture' : 'is-ai__profile-picture'}" style="margin-top: 6px;">
                <i class="fa-solid ${isUser ? 'fa-circle-user' : 'fa-robot'}" style="font-size:25px;"></i>
            </div>
            <span class="chatbot__arrow ${isUser ? 'chatbot__arrow--right' : 'chatbot__arrow--left'}"></span>
            <p class="chatbot__message" style="font-size: 13px; ${isUser ? 'text-align: right;' : ''}">${content}</p>
        `;
         messageContainer.appendChild(newMessage);
     }
 </script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script>

    const botmsgcontainer=document.querySelector(".initial-bot-msg-container");
    botmsgcontainer.addEventListener("click",function(){

        this.classList.add("d-none");

    });


 </script>


 <script>
     $(document).ready(function() {
         $(document).on('click', '.gender', function() {
             let gender = $(this).attr('name');
             console.log(gender);

             let image = gender === "boy" ? "{{ asset('assets/presets/themesFive/boy.png') }}" :
                 "{{ asset('assets/presets/themesFive/girl.png') }}";

             $(".type, #get_gender").hide();

             $('#chatbot_messages').append(
                 '<li class="is-user animation">' +
                 '<div class="is-user__profile-picture" style="margin-top: 6px;">' +
                 '<img src="' + image + '" width="35">' +
                 '</div>' +
                 '</li>' +
                 '<li class="is-ai animation" id="user_form">' +
                 '<div class="is-ai__profile-picture" style="margin-top: 6px;">' +
                 '<img class="float-left" src="{{ asset('assets/presets/themesFive/cb.png') }}" style="height: 30px;" />' +
                 '</div>' +
                 '<span class="chatbot__arrow chatbot__arrow--left"></span>' +
                 '<div class="chatbot__message" style="font-size: 13px;">' +
                 '<form id="userData" action="#" method="post">' +
                 '<div>' +
                 '<label for="">Name</label>' +
                 '<input type="text" name="u_name" class="form-control" placeholder="Enter Name">' +
                 '</div>' +
                 '<div>' +
                 '<label for="">Number</label>' +
                 '<input type="text" name="number" class="form-control" placeholder="Enter Number">' +
                 '</div>' +
                 '<button type="submit" style="margin-top: 8px; font-size: 10px; background-color:#ab2931;">Submit</button>' +
                 '</form>' +
                 '</div>' +
                 '</li>'
             );
             //User data store using AJAX
             $("#userData").on("submit", function(e) {
                 e.preventDefault();

                 let formData = {
                     u_name: $("input[name='u_name']").val(),
                     number: $("input[name='number']").val(),
                 };

                 $.ajax({
                     type: "POST",
                     url: '{{ route('storeUser') }}',
                     data: {
                         ...formData,
                         _token: "{{ csrf_token() }}"
                     },
                     dataType: 'json',
                     success: function(response) {
                         console.log(response);
                         $('#user_form').hide();
                         $('#chatbot_messages').append(
                             '<li class="is-ai animation">' +
                             '<div class="is-ai__profile-picture" style="margin-top: 6px;">' +
                             '<img class="float-left" src="{{ asset('assets/presets/themesFive/cb.png') }}" style="height: 30px;" />' +
                             '</div>' +
                             '<span class="chatbot__arrow chatbot__arrow--left"></span>' +
                             '<p class="chatbot__message" style="font-size: 13px;">Choose your Career Path</p>' +
                             '</li>'
                         );

                         // AJAX call to fetch modules from the server
                         $.ajax({
                             type: "POST",
                             url: '{{ route('getModule') }}',
                             data: {
                                 _token: "{{ csrf_token() }}"
                             },
                             dataType: 'json',
                             success: function(response) {
                                 let row = '';

                                 response.forEach(function(module,
                                     index) {
                                     row +=
                                         '<a class="btn btn-sm btn-primary getModule" id="category" style="flex: 1; color: #fff; font-size: 13px; text-decoration: none; margin-right: 10px;">' +
                                         module.title + '</a>';

                                     if ((index + 1) % 2 === 0 ||
                                         index === response
                                         .length -
                                         1) {
                                         $('#chatbot_messages')
                                             .append(
                                                 '<div style="display: flex; margin-bottom: 5px;">' +
                                                 row + '</div>'
                                             );
                                         row = '';
                                     }
                                 });
                             },
                         });
                     },
                     error: function(xhr) {
                         console.log("Error:", xhr);
                         if (xhr.status === 422) {
                             let errors = xhr.responseJSON.errors;
                             let errorMessage = '';

                             $.each(errors, function(key, value) {
                                 errorMessage += value.join(', ') +
                                     '\n';
                             });
                             alert("There were validation errors:\n" + errorMessage);
                         } else {
                             alert(
                                 "There was an error submitting your data. Please try again."
                             );
                         }
                     }
                 });
             });
             $(document).on('click', '#refreshChatbot', function() {
                 // Clear all appended data from #chatbot_messages
                 $('#chatbot_messages').empty();
                 $('#chatbot_messages').append('<li class="is-ai animation">' +
                     '<div class="is-ai__profile-picture" style="margin-top: 6px;">' +
                     '<img class="float-left" src="{{ asset('assets/presets/themesFive/cb.png') }}" style="height: 30px;" />' +
                     '</div>' +
                     '<span class="chatbot__arrow chatbot__arrow--left"></span>' +
                     '<p class="chatbot__message" style="font-size: 13px;">Hi! 🖐. I’m Narayan bot. How can I assist you today?</p>' +
                     '</li>' +
                     '<li class="is-ai animation type">' +
                     '<div class="is-ai__profile-picture" style="margin-top: 6px;">' +
                     '<img class="float-left" src="{{ asset('assets/presets/themesFive/cb.png') }}" style="height: 30px;" />' +
                     '</div>' +
                     '<span class="chatbot__arrow chatbot__arrow--left"></span>' +
                     '<p class="chatbot__message" style="font-size: 13px;">Choose your Gender</p>' +
                     '</li>' +

                     '<li class="is-ai animation getgender" id="get_gender">' +
                     '<span class="chatbot__arrow chatbot__arrow--left"></span>' +
                     '<img src="{{ asset('assets/presets/themesFive/boy.png') }}" alt="" width="80"' +
                     'style="border-radius: 50%" class="gender" name="boy">' +
                     '<img src="{{ asset('assets/presets/themesFive/girl.png') }}" alt="" width="80"' +
                     'style="border-radius: 50%" class="gender" name="girl">' +
                     '</li>');
             });


             // AJAX call to fetch categories from the server
             $(document).on('click', '#category', function() {
                 var module = $(this).text();
                 var isInstitute = module === 'Institute';
                 var isEntranceExam = module === 'Entrance Exam';
                 var isScholarship = module === 'Scholarship';
                 var isCareerLibrary = module === 'Career Library';

                 if (isInstitute) {
                     $.ajax({
                         type: "POST",
                         url: '{{ route('getCountry') }}',
                         data: {
                             _token: "{{ csrf_token() }}"
                         },
                         dataType: 'json',
                         success: function(response) {
                             if (isInstitute) {
                                 $('#chatbot_messages').append(
                                     '<li class="is-user animation">' +
                                     '<p class="chatbot__message" style="font-size: 13px; text-align: right;">' +
                                     module + '</p>' +
                                     '<span class="chatbot__arrow chatbot__arrow--right"></span>' +
                                     '<div class="is-user__profile-picture" style="margin-top: 6px;">' +
                                     '<img src="' + image + '" width="35">' +
                                     '</div>' +
                                     '</li>'
                                 );

                                 let row = '';
                                 // Loop through country data, adding only unique country names
                                 response.forEach(function(country, index) {
                                     row +=
                                         '<a class="btn btn-sm btn-primary country-btn" target="blank" style="flex: 1; color: #fff; font-size: 13px; text-decoration: none; margin-right: 10px;" data-id="' +
                                         country.id + '">' +
                                         country.name + '</a>';

                                     // Group the buttons in rows of two or end row if last item
                                     if ((index + 1) % 2 === 0 ||
                                         index === response.length - 1) {
                                         $('#chatbot_messages').append(
                                             '<div style="display: flex; margin-bottom: 5px;">' +
                                             row + '</div>'
                                         );
                                         row = '';
                                     }
                                 });
                             }
                         },
                         error: function(xhr, status, error) {
                             console.error('Error:', error);
                         }
                     });
                 }
                 if (isScholarship) {
                     $.ajax({
                         type: "POST",
                         url: "{{ route('getScolarship') }}",
                         data: {
                             _token: "{{ csrf_token() }}"
                         },
                         dataType: 'json',
                         success: function(response) {

                             // Handle Scholarship-specific data rendering here
                             $('#chatbot_messages').append(
                                 '<li class="is-user animation">' +
                                 '<p class="chatbot__message" style="font-size: 13px; text-align: right;">' +
                                 module + '</p>' +
                                 '<span class="chatbot__arrow chatbot__arrow--right"></span>' +
                                 '<div class="is-user__profile-picture" style="margin-top: 6px;">' +
                                 '<img src="' + image +
                                 '" width="35">' +
                                 '</div>' +
                                 '</li>'
                             );

                             let row = '';
                             let uniqueTypes = new Set();

                             // Loop through Scholarship response data, adding only unique types
                             response.forEach(function(scholarship,
                                 index) {
                                 if (!uniqueTypes.has(
                                         scholarship.type)) {
                                     uniqueTypes.add(
                                         scholarship
                                         .type);

                                     row +=
                                         '<a class="btn btn-sm btn-primary scholarship-btn" target="blank" href="{{ route('user.scholarship.view') }}?redirect_to={{ urlencode(route('user.scholarship.view')) }}" data-id="' +
                                         scholarship.id +
                                         '" style="flex: 1; color: #fff; font-size: 13px; text-decoration: none; margin-right: 10px;">' +
                                         scholarship.type +
                                         '</a>';

                                     if ((index + 1) % 2 ===
                                         0 || index ===
                                         response.length - 1
                                     ) {
                                         $('#chatbot_messages')
                                             .append(
                                                 '<div style="display: flex; margin-bottom: 5px;">' +
                                                 row +
                                                 '</div>'
                                             );
                                         row = '';
                                     }
                                 }
                             });

                         },
                     });
                 }
                 if (isCareerLibrary || isEntranceExam) {
                     $.ajax({
                         type: "POST",
                         url: "{{ route('get_category') }}",
                         data: {
                             _token: "{{ csrf_token() }}"
                         },
                         dataType: 'json',
                         success: function(response) {
                             $('.gender').click(function() {});
                             let gender = $(this).attr('name');
                             let image = gender === "boy" ?
                                 "{{ asset('assets/presets/themesFive/boy.png') }}" :
                                 "{{ asset('assets/presets/themesFive/girl.png') }}";

                             $('#chatbot_messages').append(
                                 '<li class="is-user animation">' +
                                 '<p class="chatbot__message" style="font-size: 13px; text-align: right;">' +
                                 module + '</p>' +
                                 '<span class="chatbot__arrow chatbot__arrow--right"></span>' +
                                 '<div class="is-user__profile-picture" style="margin-top: 6px;">' +
                                 '<img src="' + image +
                                 '" width="35">' +
                                 '</div>' +
                                 '</li>' +
                                 '<li class="is-ai animation">' +
                                 '<div class="is-ai__profile-picture" style="margin-top: 6px;">' +
                                 '<img class="float-left" src="{{ asset('assets/presets/themesFive/cb.png') }}" style="height: 30px;" />' +
                                 '</div>' +
                                 '<span class="chatbot__arrow chatbot__arrow--left"></span>' +
                                 '<p class="chatbot__message" style="font-size: 13px; margin-top: 10px;">Please Choose the Career Option from below.</p>' +
                                 '</li>'
                             );

                             let row = '';

                             // Loop through each category and create a row with 2 items per line
                             response.forEach(function(category,
                                 index) {
                                 row +=
                                     '<a class="btn btn-sm btn-primary subcategory-btn" data-id="' +
                                     category.id +
                                     '" style="flex: 1; color: #fff; font-size: 13px; text-decoration: none; margin-right: 10px;">' +
                                     category.title + '</a>';

                                 // Check if two items are in the row or it's the last item
                                 if ((index + 1) % 2 === 0 ||
                                     index ===
                                     response
                                     .length - 1) {
                                     $('#chatbot_messages')
                                         .append(
                                             '<div style="display: flex; margin-bottom: 5px;">' +
                                             row + '</div>'
                                         );
                                     row = '';
                                 }
                             });
                             // AJAX call to fetch sucategories from the server
                             $('.subcategory-btn').on('click', function() {
                                 var category_id = $(this).data('id');
                                 var category = $(this).text();
                                 $.ajax({
                                     type: "POST",
                                     url: '{{ route('get_subcategory') }}',
                                     data: {
                                         'category_id': category_id,
                                         _token: "{{ csrf_token() }}"
                                     },
                                     dataType: 'json',
                                     success: function(response) {
                                         let gender = $(this)
                                             .attr('name');
                                         let image = gender ===
                                             "boy" ?
                                             "{{ asset('assets/presets/themesFive/boy.png') }}" :
                                             "{{ asset('assets/presets/themesFive/girl.png') }}";

                                         $('#chatbot_messages')
                                             .append(
                                                 '<li class="is-user animation">' +
                                                 '<p class="chatbot__message" style="font-size: 13px; text-align: right;">' +
                                                 category +
                                                 '</p>' +
                                                 '<span class="chatbot__arrow chatbot__arrow--right"></span>' +
                                                 '<div class="is-user__profile-picture" style="margin-top: 6px;">' +
                                                 '<img src="' +
                                                 image +
                                                 '" width="35">' +
                                                 '</div>' +
                                                 '</li>' +

                                                 '<li class="is-ai animation">' +
                                                 '<div class="is-ai__profile-picture" style="margin-top: 6px;">' +
                                                 '<img class="float-left" src="{{ asset('assets/presets/themesFive/cb.png') }}" style="height: 30px;" />' +
                                                 '</div>' +
                                                 '<span class="chatbot__arrow chatbot__arrow--left"></span>' +
                                                 '<p class="chatbot__message" style="font-size: 13px; margin-top: 10px;">Please Choose the Career Option from below.</p>' +
                                                 '</li>'
                                             );

                                         let row = '';

                                         // Loop through each category and create a row with 2 items per line
                                         response.forEach(
                                             function(
                                                 subcategory,
                                                 index) {
                                                 // Create the URL for each subcategory
                                                 if (
                                                     isCareerLibrary
                                                 ) {
                                                     let subcategoryUrl =
                                                         "{{ route('user.viewSubcategory', ':id') }}"
                                                         .replace(
                                                             ':id',
                                                             subcategory
                                                             .id
                                                         );
                                                     let redirectUrl =
                                                         encodeURIComponent(
                                                             "{{ route('user.scholarship.view') }}"
                                                         );

                                                     row +=
                                                         '<a href="' +
                                                         subcategoryUrl +
                                                         '?redirect_to=' +
                                                         redirectUrl +
                                                         '" ' +
                                                         'class="btn btn-sm btn-primary" style="flex: 1; color: #fff; font-size: 13px; text-decoration: none; margin-right: 10px;">' +
                                                         subcategory
                                                         .title +
                                                         '</a>';
                                                 } else if (
                                                     isEntranceExam
                                                 ) {
                                                     row +=
                                                         '<a class="btn btn-sm btn-primary entrance_subcat" style="flex: 1; color: #fff; font-size: 13px; text-decoration: none; margin-right: 10px;" data-id="' +
                                                         subcategory
                                                         .id +
                                                         '">' +
                                                         subcategory
                                                         .title +
                                                         '</a>';
                                                 }

                                                 // Check if two items are in the row or it's the last item
                                                 if ((index +
                                                         1) %
                                                     2 ===
                                                     0 ||
                                                     index ===
                                                     response
                                                     .length -
                                                     1) {
                                                     $('#chatbot_messages')
                                                         .append(
                                                             '<div style="display: flex; margin-bottom: 5px;">' +
                                                             row +
                                                             '</div>'
                                                         );
                                                     row =
                                                         '';
                                                 }
                                             });
                                         $('.entrance_subcat')
                                             .on('click',
                                                 function() {
                                                     var subcat_id =
                                                         $(this)
                                                         .data(
                                                             'id'
                                                         );
                                                     var module =
                                                         $(this)
                                                         .text();
                                                     $.ajax({
                                                         type: "POST",
                                                         url: "{{ route('getEntranceexam') }}",
                                                         data: {
                                                             _token: "{{ csrf_token() }}",
                                                             subcat_id: subcat_id
                                                         },
                                                         dataType: 'json',
                                                         success: function(
                                                             response
                                                         ) {
                                                             if (response
                                                                 .length >
                                                                 0
                                                             ) {
                                                                 $('#chatbot_messages')
                                                                     .append(
                                                                         '<li class="is-user animation">' +
                                                                         '<p class="chatbot__message" style="font-size: 13px; text-align: right;">' +
                                                                         module +
                                                                         '</p>' +
                                                                         '<span class="chatbot__arrow chatbot__arrow--right"></span>' +
                                                                         '<div class="is-user__profile-picture" style="margin-top: 6px;">' +
                                                                         '<img src="' +
                                                                         image +
                                                                         '" width="35">' +
                                                                         '</div>' +
                                                                         '</li>'
                                                                     );

                                                                 let row =
                                                                     '';

                                                                 // Loop through each entranceexam and create a row with 2 items per line
                                                                 response
                                                                     .forEach(
                                                                         function(
                                                                             entranceexam,
                                                                             index
                                                                         ) {
                                                                             row +=
                                                                                 '<a href="' +
                                                                                 entranceexam
                                                                                 .url +
                                                                                 '" target="_blank" class="btn btn-sm btn-primary subcategory-btn" data-id="' +
                                                                                 entranceexam
                                                                                 .id +
                                                                                 '" style="flex: 1; color: #fff; font-size: 13px; text-decoration: none; margin-right: 10pcx;">' +
                                                                                 entranceexam
                                                                                 .exam_name +
                                                                                 '</a>';

                                                                             // Check if two items are in the row or it's the last item
                                                                             if ((index +
                                                                                     1
                                                                                 ) %
                                                                                 2 ===
                                                                                 0 ||
                                                                                 index ===
                                                                                 response
                                                                                 .length -
                                                                                 1
                                                                             ) {
                                                                                 $('#chatbot_messages')
                                                                                     .append(
                                                                                         '<div style="display: flex; margin-bottom: 5px;">' +
                                                                                         row +
                                                                                         '</div>'
                                                                                     );
                                                                             }
                                                                         }
                                                                     );
                                                             } else {
                                                                 $('#chatbot_messages')
                                                                     .append(
                                                                         '<li class="is-user animation">' +
                                                                         '<p class="chatbot__message" style="font-size: 13px; text-align: right;">' +
                                                                         module +
                                                                         '</p>' +
                                                                         '<span class="chatbot__arrow chatbot__arrow--right"></span>' +
                                                                         '<div class="is-user__profile-picture" style="margin-top: 6px;">' +
                                                                         '<img src="' +
                                                                         image +
                                                                         '" width="35">' +
                                                                         '</div>' +
                                                                         '</li>' +
                                                                         '<li class="is-ai animation">' +
                                                                         '<div class="is-ai__profile-picture" style="margin-top: 6px;">' +
                                                                         '<img class="float-left" src="{{ asset('assets/presets/themesFive/cb.png') }}" style="height: 30px;" />' +
                                                                         '</div>' +
                                                                         '<span class="chatbot__arrow chatbot__arrow--left"></span>' +
                                                                         '<p class="chatbot__message" style="font-size: 13px; margin-top: 10px;">No Entrance Exam Available</p>' +
                                                                         '</li>'
                                                                     );
                                                             }
                                                         },
                                                     });
                                                 })
                                     },
                                 });
                             });
                         },
                     });
                 }
             });


             $(document).on('click', '.country-btn', function() {
                 var country_id = $(this).data('id');
                 var module = $(this).text();

                 $.ajax({
                     type: "POST",
                     url: '{{ route('getState') }}',
                     data: {
                         _token: "{{ csrf_token() }}",
                         country_id: country_id
                     },
                     dataType: 'json',
                     success: function(response) {
                         console.log(response);

                         $('#chatbot_messages').append(
                             '<li class="is-user animation">' +
                             '<p class="chatbot__message" style="font-size: 13px; text-align: right;">' +
                             module + '</p>' +
                             '<span class="chatbot__arrow chatbot__arrow--right"></span>' +
                             '<div class="is-user__profile-picture" style="margin-top: 6px;">' +
                             '<img src="' + image +
                             '" width="35">' +
                             '</div>' +
                             '</li>'
                         );

                         let row = '';
                         // Loop through country data, adding only unique country names

                         row +=
                             '<li class="is-ai animation">' +
                             '<div class="is-ai__profile-picture" style="margin-top: 6px;">' +
                             '<img class="float-left" src="{{ asset('assets/presets/themesFive/cb.png') }}" style="height: 30px;" />' +
                             '</div>' +
                             '<span class="chatbot__arrow chatbot__arrow--left"></span>' +
                             '<p class="chatbot__message">' +
                             '<select class="get_type" style="font-size: 13px; width: 100%; margin-top: 5px;">' +
                             '<option value="">-- Select an State --</option>';
                         response.forEach(function(state) {
                             row += '<option value="' + state
                                 .id + '">' +
                                 state.name + '</option>';
                         });

                         row += '</select>' +
                             '</p>' +
                             '</li>';

                         $('#chatbot_messages').append(
                             '<div style="display: flex; margin-bottom: 5px;">' +
                             row + '</div>'
                         );

                     },
                     error: function(xhr, status, error) {
                         console.error('Error:', error);
                     }
                 });
             });

             $(document).on('change', '.get_type', function() {
                 var state_id = $(this).val();

                 $('#chatbot_messages').append(
                     '<div id="chatbot_messages">' +
                     '<div style="display: flex; margin-bottom: 5px;">' +
                     '<a class="btn btn-sm btn-primary type-btn" target="blank" style="flex: 1; color: #fff; font-size: 13px; text-decoration: none; margin-right: 10px;" data-id="0">Government</a>' +
                     '<a class="btn btn-sm btn-primary type-btn" target="blank" style="flex: 1; color: #fff; font-size: 13px; text-decoration: none;" data-id="1">Private</a>' +
                     '</div>' +
                     '</div>'
                 );

                 $('.type-btn').on('click',
                     function() {
                         var module = $(this).text();
                         var type_id = $(this).data('id');

                         $.ajax({
                             type: "POST",
                             url: '{{ route('Institute_type') }}',
                             data: {
                                 _token: "{{ csrf_token() }}",
                                 state_id: state_id,
                                 type_id: type_id
                             },
                             dataType: 'json',
                             success: function(response) {
                                 console.log(response);

                                 let instituteType = response
                                     .institute_type ||
                                     'Unknown Institute Type';

                                 $('#chatbot_messages').append(
                                     '<li class="is-user animation">' +
                                     '<p class="chatbot__message" style="font-size: 13px; text-align: right;">' +
                                     module + '</p>' +
                                     '<span class="chatbot__arrow chatbot__arrow--right"></span>' +
                                     '<div class="is-user__profile-picture" style="margin-top: 6px;">' +
                                     '<img src="' + image +
                                     '" width="35">' +
                                     '</div>' +
                                     '</li>'
                                 );

                                 let row = '';
                                 row += '<div class="row">';
                                 response.forEach(function(
                                     institute_type) {
                                     row +=
                                         '<div class="col-md-12" style="display: flex; flex-wrap: wrap;">' +
                                         '<a href="' +
                                         institute_type
                                         .url +
                                         ' " target="_blank" class="btn btn-sm btn-primary" target="blank" style="flex: 1; color: #fff; font-size: 13px; text-decoration: none; margin-right: 10px; margin-bottom: 5px; ">' +
                                         institute_type
                                         .name + '</a>' +
                                         '</div>';
                                 });
                                 row += '</div>';


                                 $('#chatbot_messages').append(
                                     '<div style="display: flex; margin-bottom: 5px;">' +
                                     row + '</div>'
                                 );
                             },
                             error: function(xhr, status, error) {
                                 console.error('Error:', error);
                             }
                         });
                     });
             });
         });
     });
 </script>
