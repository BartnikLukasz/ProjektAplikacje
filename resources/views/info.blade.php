<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Blog podróżniczy</title>
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">



    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
</head>
<body>
    @include('layouts.navbar')
    <main class="container">
        <div class="title">
            <h1>Informacje o projekcie</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="row g-0 flex-md-row mb-4 shadow-sm h-md-1000 position-relative">
                    <div id="regulamin" class="col p-4 d-flex flex-column position-static">
                            <p>
                                <strong>Użyte technologie.</strong><br>
                                <ul>
                                    <li>PHP, wersja 7.3</li>
                                    <li>Framework Laravel, wersja 8.21.0</li>
                                    <li>Framework Bootstrap, wersja 4.3.1</li>
                                    <li>Framework JQuery, wersja 3.3.1</li>
                                    <li>MariaDB, wersja 10.4.22</li>
                                </ul>
                                Jako język do napisania strony serwerowej zdecydowano się na język PHP. Zaletami takiego rozwiązania jest między innymi prostota połączenia backendu z frontendem,
                                co dla niewielkiej aplikacji, takiej jak blog. Dodatkowo jednym z założeń projektu było poznanie zasad działania systemów internetowych,
                                co język PHP w połączeniu z frameworkiem Laravel zapewnia, moim zdaniem, w sposób bardziej zrozumiały niż inne dostępne rozwiązania, posiadające większy poziom abstrakcji.
                                <br>
                                Dla usprawnienia utworzenia REST API zdecydowano się na użycie framoworku Laravel. Jest to framework, który oprócz ustandaryzowania kontrolerów, migracji, i modelu danych po stronie serwerowej,
                                 oferuje silnik szablonów Blade, wspomagający pracę z kodem html, co usprawnia wiele aspektów połączenia strony serwerowej z frontendem.
                                <br>
                                Po stronie frontendu zdecydowano się na użycie frameworku JQuery, który wspomaga użycie skryptów javascript oraz użyto frameworku CSS Bootstrap,
                                 który oferuje wiele gotowych do użycia stylów komponentów.
                                <br>
                                Jako bazę danych użyto MariaDB, w ramach programu XAMPP, którego użyto do konfiguracji i postawienia środowiska lokalnego.
                            </p>
                            <p>
                                <strong>Założenia serwisu</strong><br>
                                Serwis miał być prostą stroną internetową, z możliwością rejestracji i logowania, która umożliwia wstawianie postów z treścią i obrazami, oraz komentarzy do tych postów.
                                Strona składa się ze stron statycznych, dostępnych z komponentu navbar, "Strona główna", "Regulamin", "Kontakt" i "Info". Oprócz nich, na serwisie znajdują się również strony
                                z treścią wstawianą przez użytkowników, "Posty", strona konkretnego postu oraz strona danego użytkownika. Dla autora postu umożliwiona została również edycja jego treści i jego usunięcie.
                            </p>
                            <p>
                                <strong>Spełnienie wymagań projektu.</strong><br>
                                Serwis został zrealizowany na bazie technologii HTML5.
                                <br>
                                Na serwisie oprócz frameworku Bootstrap zastosowano również własnoręcznie napisane reguły CSS.
                                <br>
                                Strona została przetestowana i działa poprawnie na przeglądarkach:
                                <ul>
                                    <li>Firefox: wersje 108 i 70</li>
                                    <li>Opera: wersje 96 i 52</li>
                                    <li>Chrome: wersje 111 i 96</li>
                                    <li>Microsoft Edge: wersje 111 i 80</li>
                                </ul>
                                <br>
                                Serwis jest dostosowany dla niepełnosprawnych, np. wszystkie obrazki posiadają teksty alternatywne.
                                <br>
                                Serwis poza HTML i CSS używa wielu innych technologii, między innymi skrypty po stronie serwera, klienta i bazę danych.
                                <br>
                                Serwis posiada rozbudowany system nawigacji, który jest użyteczny w kontekście tego serwisu.
                                <br>
                                Serwis został stworzony z myślą o jego użyteczności i dostępności dla potencjalnych użytkowników.
                            </p>
                    </div>
                </div>
            </div>
        </div>

    </main>
</body>
</html>
