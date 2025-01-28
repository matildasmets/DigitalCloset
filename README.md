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
    ```bash
    docker run --rm -v $(pwd):/app composer require laravel/sail --dev
    ```

   ```bash
   ./vendor/bin/sail up --build
   ```
3. **Run migraties**

   ```bash
   ./vendor/bin/sail artisan migrate
   ```
4. **Start de applicatie**

   ```bash
   ./vendor/bin/sail up
   ```
5. **Open je browser**
   Ga naar `http://localhost` om de applicatie te bekijken.
