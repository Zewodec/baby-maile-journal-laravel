@extends('master')

@section('title', 'Форму спілкування')

@section('content')
    <h1 class="h1_anastasia text-center">Форум спілкування</h1>

    <section class="settings-section">
        <div>
            <h3 class="h3_anastasia">Чат:</h3>
            <div class="border-container chat-container">
                <div class="messages-content" id="messages-content">
{{--                    <div class="message">--}}
{{--                        <h5 class="message__username">--}}
{{--                            Nazik--}}
{{--                        </h5>--}}
{{--                        <p class="message__text">--}}
{{--                            Хелоу еврібаді--}}
{{--                        </p>--}}
{{--                    </div>--}}
                </div>
                <div class="message__actions">
                    <input id="message_input" class="input-text" type="text" placeholder="Написати повідомлення...">
                    <button id="send_message_button" class="action-button3" type="button">Відправити</button>
                </div>

            </div>
        </div>

    </section>


@endsection

@section('scripts')

{{--    const chat = document.getElementById('messages-content');--}}
{{--    const messageInput = document.getElementById('message_input');--}}
{{--    const sendButton = document.getElementById('send_message_button');--}}

<script>
    const chat = document.getElementById('messages-content');
    const messageInput = document.getElementById('message_input');
    const sendButton = document.getElementById('send_message_button');

    const ws = new WebSocket('ws://localhost:3000');

    ws.onmessage = (event) => {
        try {
            const data = JSON.parse(event.data);
            const message = document.createElement('div');
            message.className = 'message';
            const username = document.createElement('h5');
            username.className = 'message__username';
            username.textContent = data.username;
            const text = document.createElement('p');
            text.className = 'message__text';
            text.textContent = data.message;
            message.appendChild(username);
            message.appendChild(text);
            chat.appendChild(message);
            chat.scrollTop = chat.scrollHeight;
        } catch (error) {
            console.error('Error parsing JSON:', error);
        }
    };

    sendButton.onclick = () => {
        const username = '{{$username}}';
        const message = messageInput.value;
        if (username && message) {
            const data = { username, message };
            ws.send(JSON.stringify(data));
            messageInput.value = '';
        } else {
            alert('Please enter both username and message.');
        }
    };

    messageInput.addEventListener('keypress', (event) => {
        if (event.key === 'Enter') {
            sendButton.click();
        }
    });
</script>
@endsection
