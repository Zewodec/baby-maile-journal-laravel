<footer class="footer">
    <div class="footer__column footer__column_center">
        <img src="{{URL::asset('images/logo.png')}}" alt="footer logo"/>
        <h3 class="footer__column__big-text">Зробіть своє життя<br>простішим і<br>приємнішим!</h3>
    </div>

    <div class="footer__column">
        <h6 class="footer__column__tiny-text footer__column__tiny-text_menu-header">Навігація</h6>
        <ul class="footer__column__list">
            <li><a class="footer__column__tiny-text" href="{{route('index')}}#about-us-section">Про нас</a></li>
            <li><a class="footer__column__tiny-text" href="{{route('index')}}#options-section">Опції</a></li>
            <li><a class="footer__column__tiny-text" href="{{route('index')}}#feedback-section">Відгуки</a></li>
            <li><a class="footer__column__tiny-text" href="{{route('index')}}#faq-section">Часті запитання</a></li>
        </ul>
    </div>

    <div class="footer__column">
        <h6 class="footer__column__tiny-text footer__column__tiny-text_menu-header">Підтримка</h6>
        <ul class="footer__column__list">
            <li><a class="footer__column__tiny-text" href="#">Політика конфіденційності</a></li>
            <li><a class="footer__column__tiny-text" href="#">Умови та положення</a></li>
            <li><a class="footer__column__tiny-text" href="#">Довідка та підтримка</a></li>
        </ul>
    </div>

    <div class="footer__column footer__column_center">
        <h3 class="footer__column__big-text">Якщо виникли питання,<br>пишіть нам!</h3>
        <label>
            <textarea id="textarea-help" class="footer__column__textarea" placeholder="Пишіть тут..."></textarea>
        </label>
        <a id="sendHelpEmail" href="mailto:baby-mile-journal@theuniverse.cx.ua?subject=Допомога&body=" class="action-button w100percent">Написати</a>
    </div>

    <script>
        document.getElementById('sendHelpEmail').addEventListener('click', function() {
            let textareaValue = document.getElementById('textarea-help').value;
            this.href = "mailto:baby-mile-journal@theuniverse.cx.ua?subject=Допомога&body=" + textareaValue;
        });
    </script>
</footer>
