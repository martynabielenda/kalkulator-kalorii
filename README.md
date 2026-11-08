# Kalkulator zapotrzebowania na kalorie

Projekt wykonany na przedmiot **Aplikacje internetowe**.

## Opis projektu

Kalkulator służy do szacowania dziennego zapotrzebowania kalorycznego na podstawie danych użytkownika. Umożliwia określenie liczby kalorii potrzebnych do utrzymania aktualnej masy ciała, redukcji masy ciała lub zwiększenia masy ciała.

Aplikacja posiada system logowania, który zabezpiecza dostęp do kalkulatora. Projekt został podzielony na osobne pliki PHP, co ułatwia jego rozwijanie i utrzymanie.

## Funkcjonalności

### Kalkulator kalorii
- Wprowadzanie wieku, płci, masy ciała i wzrostu.
- Wybór poziomu aktywności fizycznej.
- Wybór celu: utrzymanie wagi, redukcja lub zwiększenie masy ciała.
- Obliczanie podstawowej przemiany materii (PPM).
- Szacowanie dziennego zapotrzebowania kalorycznego.
- Wyświetlanie zalecanej liczby kalorii dziennie.
- Walidacja danych wprowadzonych przez użytkownika.

### System logowania
- Logowanie użytkowników za pomocą loginu i hasła.
- Obsługa sesji PHP.
- Ochrona dostępu do kalkulatora dla niezalogowanych użytkowników.
- Możliwość wylogowania.

### Szablonowanie
- Oddzielenie logiki aplikacji od warstwy prezentacji.
- Wykorzystanie wspólnego nagłówka i stopki.
- Osobne widoki dla formularza logowania i kalkulatora.
- Oddzielny plik CSS odpowiedzialny za wygląd aplikacji.
- Różowa stylistyka CalorieCare z responsywnym układem formularzy i kart wyników.

## Wykorzystane technologie

- PHP
- HTML
- CSS
- Google Fonts (DM Sans i Manrope – ładowane zewnętrznie)
- Sesje PHP
- Git i GitHub

## Zastosowany wzór

Do obliczenia podstawowej przemiany materii wykorzystano wzór Mifflina-St Jeora. Następnie wynik jest mnożony przez współczynnik aktywności fizycznej.

W zależności od wybranego celu kalkulator szacuje docelową liczbę kalorii:

- **Utrzymanie wagi** – zapotrzebowanie uwzględniające aktywność.
- **Redukcja masy ciała** – umiarkowany deficyt kaloryczny.
- **Zwiększenie masy ciała** – umiarkowana nadwyżka kaloryczna.

## Struktura projektu

```text
kalkulator-kalorii/
│
├── index.php
├── config.php
├── README.md
│
├── assets/
│   └── css/
│       └── style.css
│
└── app/
    ├── kalorie.php
    ├── kalorie_view.php
    │
    ├── templates/
    │   ├── header.php
    │   └── footer.php
    │
    └── security/
        ├── login.php
        ├── login_view.php
        ├── check.php
        └── logout.php
```

## Uruchomienie projektu

1. Pobrać lub sklonować repozytorium.
2. Umieścić folder projektu w katalogu `htdocs` serwera XAMPP.
3. Uruchomić serwer Apache.
4. Otworzyć aplikację w przeglądarce pod adresem:

`http://localhost/kalkulator-kalorii/`

## Autor

Projekt studencki – przedmiot Aplikacje internetowe.
