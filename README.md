# Linux Automatic Workshop Project

Aplikacja do automatycznej i zdalnej instalacji systemów Linux na wielu stanowiskach w pracowni komputerowej. Pozwala na zarządzanie komputerami, użytkownikami, instalacją systemu oraz monitorowanie statusu usług.

## Funkcje

- **Instalacja systemu** – wybór komputerów, typu bootowania (UEFI/Legacy), środowiska (CLI/GUI), kopiowanie maszyn wirtualnych, ustawienie prędkości kopiowania.
- **Zarządzanie komputerami** – lista komputerów, dodawanie, edycja, usuwanie wpisów (wersja demo).
- **Zarządzanie użytkownikami** – lista użytkowników, dodawanie, edycja, usuwanie (wersja demo).
- **Status systemu** – podgląd statusu usług, informacja o ostatnim backupie, odświeżanie statusu.
- **Backup** – możliwość wykonania backupu (wersja demo).
- **Motyw jasny/ciemny** – przełącznik motywu w interfejsie.
- **Responsywny, nowoczesny interfejs** – atrakcyjne formularze, tabele, przyciski, modalne okna.

## Struktura projektu

- `install_demo.html` – demo instalacji systemu.
- `computers_demo.html` – demo zarządzania komputerami.
- `users_demo.html` – demo zarządzania użytkownikami.
- `status_demo.html` – demo statusu systemu.
- `script_demo.js` – JavaScript do obsługi interakcji w wersji demo.
- `css/style3.css` – główny styl strony.
- `css/style_install_demo.css` – nowoczesny styl formularza instalacji.
- `src/` – kod backendowy (PHP, JS, Python), szablony Jinja2, pliki YAML do automatyzacji.
  - `php/` – obsługa bazy danych, backupu, użytkowników, komputerów.
  - `template/` – szablony Jinja2 dla automatyzacji.
  - `yml/` – pliki konfiguracyjne Ansible/YAML.
  - `ssh.py` – skrypt do sprawdzania dostępności komputerów przez SSH.
  - `script.js` – JS do obsługi modali i akcji w wersji produkcyjnej.

## Wymagania

- Serwer WWW z obsługą PHP i MySQL/MariaDB.
- Python (do skryptów automatyzujących).
- Ansible (do automatyzacji instalacji przez pliki YAML).
- Przeglądarka internetowa (do wersji demo).

## Instalacja i uruchomienie

1. Sklonuj repozytorium.
2. Skonfiguruj połączenie z bazą danych w `src/php/config.php`.
3. Uruchom serwer WWW i bazę danych.
4. Otwórz pliki demo w przeglądarce (`install_demo.html`, `computers_demo.html`, itd.).
5. Wersja demo nie wykonuje operacji na serwerze – służy do prezentacji interfejsu.

## Demo

- Wszystkie funkcje w wersji demo są nieaktywne – służą do prezentacji wyglądu i działania interfejsu.
- Wersja produkcyjna wymaga konfiguracji backendu i bazy danych.

## Autor

Projekt: Tomurek  
Repozytorium: [Linux-automatic-workshop-project](https://github.com/Tomurek/Linux-automatic-workshop-project)

