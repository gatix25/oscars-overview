#### Popis aplikace - Přehled oscarů za nejlepší mužskou a ženskou hlavní roli

Tato aplikace zobrazuje přehled oscarových vítězů za nejlepší mužskou a ženskou hlavní roli. Uživatel nahraje dva CSV soubory obsahující údaje o vítězech a aplikace je zpracuje a zobrazí výsledky v přehledných tabulkách pomocí Bootstrap 5.

#### Použité technologie:
- **PHP**: Pro zpracování nahraných CSV souborů.
- **Bootstrap 5**: Pro stylování HTML stránek a zobrazení tabulek.
- **Docker**: Pro snadné nasazení a spuštění aplikace.

#### Funkcionality:

1. **Formulář pro nahrání CSV souborů**:
   - Aplikace umožňuje uživateli nahrát dva CSV soubory:
     - [Oscar - nejlepší herečky](https://people.sc.fsu.edu/~jburkardt/data/csv/oscar_age_female.csv)
     - [Oscar - nejlepší herci](https://people.sc.fsu.edu/~jburkardt/data/csv/oscar_age_male.csv)
   - Po nahrání souborů aplikace zpracuje data a zobrazí je v přehledné tabulce.

2. **Tabulka 1: Přehled oscarových vítězů podle roku**:
   - Obsahuje tři sloupce: **Rok**, **Ženy**, **Muži**.
   - Ve sloupcích Ženy/Muži se zobrazuje jméno vítězného herce/herečky (v závorce jejich věk) a pod ním název filmu, za který získali ocenění.

3. **Tabulka 2: Filmy, které získaly Oscara za mužskou i ženskou hlavní roli**:
   - Obsahuje čtyři sloupce: **Název filmu**, **Rok**, **Herečka**, **Herec**.
   - Tabulka je abecedně seřazená podle názvu filmu.
   - Zobrazuje filmy, kde oba hlavní herci získali Oscara.

#### Instalace a spuštění:

1. **Docker**:
   - Aplikace je připravena pro spuštění pomocí Dockeru. Pokud nemáte Docker nainstalovaný, stáhněte si ho z [oficiální stránky Dockeru](https://www.docker.com/).

2. **Kroky k nasazení aplikace pomocí Dockeru**:
   1. Klonujte tento repozitář:
      ```bash
      git clone https://github.com/tvuj-username/oscar-app.git
      cd oscar-app
      ```

   2. Spusťte Docker a sestavte kontejner:
      ```bash
      docker-compose up --build
      ```

   3. Po sestavení aplikace bude dostupná na lokální adrese, například:
      ```
      http://localhost:8000
      ```

3. **Nahrání CSV souborů**:
   - Otevřete aplikaci v prohlížeči.
   - Nahrajte oba CSV soubory a zobrazí se dvě výše popsané tabulky.

#### Struktura projektu:

- **index.php**: Hlavní stránka s formulářem pro nahrání CSV souborů a zobrazení výsledků.
- **upload.php**: Skript pro zpracování nahraných CSV souborů.
- **Dockerfile**: Konfigurace pro Docker image.
- **docker-compose.yml**: Konfigurace Dockeru pro snadné spuštění aplikace.

#### Požadavky:
- **PHP 7.4+**
- **Bootstrap 5**
- **Docker**
