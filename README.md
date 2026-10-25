# Kalkulator zapotrzebowania na kalorie

Zadanie wykonane na przedmiot **Aplikacje internetowe**.

## Opis projektu

Kalkulator służy do szacowania dziennego zapotrzebowania kalorycznego na podstawie danych użytkownika. Umożliwia określenie liczby kalorii potrzebnych do utrzymania aktualnej masy ciała, redukcji masy ciała lub zwiększenia masy ciała.

## Funkcjonalności

- Wprowadzanie wieku, płci, masy ciała i wzrostu.
- Wybór poziomu aktywności fizycznej.
- Wybór celu: utrzymanie wagi, redukcja lub zwiększenie masy ciała.
- Obliczanie podstawowej przemiany materii (PPM).
- Szacowanie dziennego zapotrzebowania kalorycznego.
- Wyświetlanie zalecanej liczby kalorii dziennie.
- Walidacja danych wprowadzonych przez użytkownika.

## Wykorzystane technologie

- PHP
- HTML
- CSS

## Zastosowany wzór

Do obliczenia podstawowej przemiany materii wykorzystano wzór Mifflina-St Jeora. Następnie wynik jest mnożony przez współczynnik aktywności fizycznej.

W zależności od wybranego celu kalkulator szacuje docelową liczbę kalorii:
- **Utrzymanie wagi** – zapotrzebowanie uwzględniające aktywność.
- **Redukcja masy ciała** – umiarkowany deficyt kaloryczny.
- **Zwiększenie masy ciała** – umiarkowana nadwyżka kaloryczna.
