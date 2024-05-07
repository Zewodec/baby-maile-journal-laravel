<!DOCTYPE html>
<html lang="en">
<head>
    <title>Baby Mile Journal</title>

    @include('layouts.link-meta')

    <!-- SWIPER JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>
<body>

@include('layouts.header-nav')

<div class="introduction">
    <div class="introduction__left">
        <h1 class="introduction__left__title">
            Пiдтримка батькiвства: Вiдстежуй, Годуй, Рости!
        </h1>
        <p class="introduction__left__text">
            Найкращий веб-сайт для відстеження вагітності та моніторингу розвитку та здоров'я вашого малюка.
        </p>
        <a href="{{route('auth')}}" class="action-button">Почнімо!</a>
    </div>

    <div class="introduction__right">
        <!--        <img src="images/s1_bg.png" alt="вагітна жінка"/>-->
    </div>
</div>

<section class="about-us" id="about-us-section">
    <div class="about-us__left">
        <img src="{{ URL::asset('images/about-us_section.png') }}" alt="about-us"/>
    </div>
    <div class="about-us__right">
        <h4 class="category">
            <img src="{{ URL::asset('images/lapa-icon.png')}}" alt="lapa"/>
            ПРО НАС
            <img src="{{URL::asset('images/lapa-icon.png')}}" alt="lapa"/>
        </h4>
        <h2 class="about-us__right__title">
            Цей веб-сайт для підтримки молодих батькiв відіграє важливу роль у наданні доступної та інформативної
            допомоги на всіх етапах батьківства.
        </h2>
        <p class="about-us__right__text">
            Це цінний ресурс для батьків, оскільки надає зручний доступ до перевіреної інформації про догляд за
            малюками, виховання, розвиток дитини та здоров'я сім'ї.<br>
            Спеціалізовані поради, практичні поради та рекомендації створюють динамічне та підтримуюче середовище для
            росту та розвитку сімей.<br>
            Такий веб-сайт допомагає батькам відчувати себе впевнено в їхній ролі, роблячи батьківство менш підступним і
            більш приємним досвідом.
        </p>
    </div>
</section>

<section class="statistic">
    <div class="statistic__item">
        <h2 class="statistic__item__number">1000+</h2>
        <hr class="statistic__item__hr"/>
        <h5 class="statistic__item__text">задоволених користувачів</h5>
    </div>

    <div class="statistic__item">
        <h2 class="statistic__item__number">2500+</h2>
        <hr class="statistic__item__hr"/>
        <h5 class="statistic__item__text">професійних порад та медичних статей</h5>
    </div>

    <div class="statistic__item">
        <h2 class="statistic__item__number">24/7</h2>
        <hr class="statistic__item__hr"/>
        <h5 class="statistic__item__text">технічної підтримки</h5>
    </div>
</section>

<section class="options" id="options-section">
    <h4 class="category">
        <img src="{{URL::asset('images/lapa-icon.png')}}" alt="lapa"/>
        ОПЦІЇ
        <img src="{{URL::asset('images/lapa-icon.png')}}" alt="lapa"/>
    </h4>
    <h2 class="section-title">Слідкуйте за своєю вагітністю та контролюйте здоров'я вашої дитини</h2>
    <p class="section-text">Відчуйте зручність наших комплексних можливостей відстеження<br>вагітності та моніторингу
        здоров'я малюка</p>
    <div class="options__grid">
        <div class="options__grid__item">
            <img src="{{URL::asset('images/option-item-icon.png')}}" alt="Item icon"/>
            <div class="options__grid__item__text-column">
                <h3 class="options__grid__item__text-column__title">Трекер вагітності</h3>
                <p class="options__grid__item__text-column__text">Відстежуйте свою вагітність і отримуйте
                    персоналізовані поради</p>
            </div>
        </div>

        <div class="options__grid__item">
            <img src="{{URL::asset('images/option-item-icon.png')}}" alt="Item icon"/>
            <div class="options__grid__item__text-column">
                <h3 class="options__grid__item__text-column__title">Оновлення розвитку дитини</h3>
                <p class="options__grid__item__text-column__text">Отримуйте регулярні оновлення про ріст та розвиток
                    вашої дитини</p>
            </div>
        </div>

        <div class="options__grid__item">
            <img src="{{URL::asset('images/option-item-icon.png')}}" alt="Item icon"/>
            <div class="options__grid__item__text-column">
                <h3 class="options__grid__item__text-column__title">Моніторинг здоров'я</h3>
                <p class="options__grid__item__text-column__text">Слідкуйте за своїм здоров'ям та отримуйте рекомендації
                    для здорової вагітності</p>
            </div>
        </div>

        <div class="options__grid__item">
            <img src="{{URL::asset('images/option-item-icon.png')}}" alt="Item icon"/>
            <div class="options__grid__item__text-column">
                <h3 class="options__grid__item__text-column__title">Нагадування</h3>
                <p class="options__grid__item__text-column__text">Регулярність - запорука здорової вагітності та
                    здоров’я і щастя малюка!</p>
            </div>
        </div>
    </div>
</section>

<section class="what-waiting">
    <h2 class="section-title">Що чекає на вас</h2>
    <p class="section-text">Усі ці моменти ви зможете зафіксувати за<br>допомогою нас</p>
    <div class="what-waiting__grid">
        <div class="what-waiting__grid__column">
            <img src="{{URL::asset('images/wws-1.png')}}" alt="What waiting item"/>
            <img src="{{URL::asset('images/wws-4.png')}}" alt="What waiting item"/>
        </div>
        <div class="what-waiting__grid__column">
            <img src="{{URL::asset('images/wws-2.png')}}" alt="What waiting item"/>
            <img src="{{URL::asset('images/wws-5.png')}}" alt="What waiting item"/>
        </div>
        <div class="what-waiting__grid__column">
            <img src="{{URL::asset('images/wws-3.png')}}" alt="What waiting item"/>
            <img src="{{URL::asset('images/wws-6.png')}}" alt="What waiting item"/>
        </div>
    </div>
</section>

<section class="feedbacks" id="feedback-section">
    <h4 class="category">
        <img src="{{URL::asset('images/lapa-icon.png')}}" alt="lapa"/>
        ВІДГУКИ
        <img src="{{URL::asset('images/lapa-icon.png')}}" alt="lapa"/>
    </h4>
    <h2 class="section-title">Що кажуть наші користувачі</h2>
    <p class="section-text">Деякі наші користувачі поділилися своїм досвідом з нами</p>
    <div class="swiper feedback-swiper">
        <div class="swip-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="feedbacks__list__items__item">
                        <img class="feedbacks__list__items__item__image" src="{{URL::asset('images/feedback-avatars/person1.png')}}"
                             alt="person">
                        <h4 class="feedbacks__list__items__item__title">Вадим Карпенко</h4>
                        <hr class="feedbacks__list__items__item__separator"/>
                        <p class="feedbacks__list__items__item__text">Я так вдячний за цей додаток! Він став невід'ємним
                            інструментом у житті з моєю дружиною. Велика кількість професійних порад та медичних статей
                            були
                            надзвичайно інформативними та допомогли нам впевнено пройти цей період.</p>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="feedbacks__list__items__item">
                        <img class="feedbacks__list__items__item__image"
                             src="{{URL::asset('images/feedback-avatars/person2.png')}}" alt="person">
                        <h4 class="feedbacks__list__items__item__title">Адріана Терненко</h4>
                        <hr class="feedbacks__list__items__item__separator"/>
                        <p class="feedbacks__list__items__item__text">Цей веб-сайт став невід'ємним
                            супутником у моєму
                            вагітність. Він надає інформативні оновлення про розвиток мого малюка та
                            своєчасні нагадування про
                            важливі події. Крім того, мене вражає оперативна та ефективна технічна підтримка
                            у вирішенні
                            будь-яких питань чи проблем.</p>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="feedbacks__list__items__item">
                        <img class="feedbacks__list__items__item__image"
                             src="{{URL::asset('images/feedback-avatars/person3.png')}}" alt="person">
                        <h4 class="feedbacks__list__items__item__title">Анна Позвань</h4>
                        <hr class="feedbacks__list__items__item__separator"/>
                        <p class="feedbacks__list__items__item__text">Як люблю цю програму! Вона була
                            невід'ємним помічником у
                            моєму вагітність. Від професійних порад і інформативних статей до безшовної
                            технічної підтримки, все
                            в ній перевищило мої очікування.</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

</section>

<section class="often-question" id="faq-section">
    <div class="often-question__left">
        <h4 class="category">
            <img src="{{URL::asset('images/lapa-icon.png')}}" alt="lapa"/>
            Часті запитання
            <img src="{{URL::asset('images/lapa-icon.png')}}" alt="lapa"/>
        </h4>
        <h2 class="often-question__left__title">Найпоширеніші запитання</h2>
        <p class="often-question__left__text">Ось деякі з найпоширеніших запитань, які ми отримуємо</p>
        <img src="{{URL::asset('images/question-section.png')}}" alt="mother and child"/>
    </div>
    <img src="{{URL::asset('images/vertical-line.png')}}" alt="vert line">
    <div class="often-question__right">
        <div class="often-question__right__item">
            <div class="often-question__right__item__header">
                <h3 class="often-question__right__item__header__title">Чи є наявна опція зворотного зв'язку для
                    користувачів?</h3>
                <img id="tick1" class="often-question__right__item__header__image-button" src="{{URL::asset('images/plus.svg')}}"
                     alt="plus"/>
            </div>
            <p id="answer1" class="often-question__right__item__text hidden">Так, існує опція зворотного зв'язку для
                запитів або коментарів
                користувачів.</p>
        </div>

        <div class="often-question__right__item">
            <div class="often-question__right__item__header">
                <h3 class="often-question__right__item__header__title">Як часто оновлюється інформація на
                    веб-сайті?</h3>
                <img id="tick2" class="often-question__right__item__header__image-button" src="{{URL::asset('images/plus.svg')}}"
                     alt="plus"/>
            </div>
            <p id="answer2" class="often-question__right__item__text hidden">Інформація моніториться по актуальності,
                оскільки сучасна наука не стоїть на місці, тому дані на сайті мають їй відповідати.</p>
        </div>

        <div class="often-question__right__item">
            <div class="often-question__right__item__header">
                <h3 class="often-question__right__item__header__title">Чи можна вашим сайтом замінити консультації у
                    лікарів?</h3>
                <img id="tick3" class="often-question__right__item__header__image-button" src="{{URL::asset('images/plus.svg')}}"
                     alt="plus"/>
            </div>
            <p id="answer3" class="often-question__right__item__text hidden">Ні в якому разі! Інформація на цьому сайті
                виключно консультативна, тому радимо усе перевіряти та узгоджувати у ваших лікарів.</p>
        </div>

        <div class="often-question__right__item">
            <div class="often-question__right__item__header">
                <h3 class="often-question__right__item__header__title">Наскільки правдива інформація та в якому обсязі
                    вона надається?</h3>
                <img id="tick4" class="often-question__right__item__header__image-button" src="{{URL::asset('images/plus.svg')}}"
                     alt="plus"/>
            </div>
            <p id="answer4" class="often-question__right__item__text hidden">Інформація уся підтверджена лікарями та
                відповідними протоколами.</p>
        </div>

        <div class="often-question__right__item">
            <div class="often-question__right__item__header">
                <h3 class="often-question__right__item__header__title">Чи є доступна програма для завантаження?</h3>
                <img id="tick5" class="often-question__right__item__header__image-button" src="{{URL::asset('images/plus.svg')}}"
                     alt="plus"/>
            </div>
            <p id="answer5" class="often-question__right__item__text hidden">Поки що ні, але ми вже активно працюємо над
                цим!</p>
        </div>
    </div>
</section>

@include('layouts.footer')

<script src="{{URL::asset('js/faq.js')}}"></script>
<script src="{{URL::asset('https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js')}}"></script>
<script src="{{URL::asset('js/feedback-swiper.js')}}"></script>
</body>
</html>
