# Digital Closet

## Installatie

### Vereisten

- [Docker](https://www.docker.com/) geïnstalleerd op je computer

### Stappen

1. **Clone de repository**

   ```bash
   git clone https://github.com/matildasmets/DigitalCloset.git
   cd DigitalCloset
    ```
2. **Installeer afhankelijkheden**

   **MacOs/Linux:**
    ```bash
    docker run --rm -v $(pwd):/app composer require laravel/sail --dev
    ```

   **Windows:**
   ```bash
   docker run --rm -v %cd%:/app composer require laravel/sail --dev
   ```

   ```bash
   ./vendor/bin/sail up --build
   ```
4. **Creëer een .env-bestand**
   
Kopieer de inhoud van het bestand `.env.example` en plak deze in een nieuw bestand genaamd `.env`. Controleer en pas indien nodig de database-instellingen aan, zodat ze overeenkomen met de standaardinstellingen van Laravel Sail.
4. **Genereer een applicatiesleutel**
    ```bash
    ./vendor/bin/sail artisan key:generate
    ```
5. **Run migraties**

   ```bash
   ./vendor/bin/sail artisan migrate
   ```
6. **Start de applicatie**

   ```bash
   ./vendor/bin/sail up
   ```
7. **Open je browser**
   Ga naar `http://localhost` om de applicatie te bekijken.
