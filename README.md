# Laravel Feco

Laravel Feco es un paquete que te permite generar facturas electrónicas en Colombia (DIAN).

## Instalar

```bash
composer require dazza-dev/laravel-feco
```

## Configurar

Publica el archivo de configuración:

```bash
php artisan vendor:publish --tag="laravel-feco-config"
```

## Migraciones

Publica y ejecuta las migraciones:

```bash
php artisan vendor:publish --tag="laravel-feco-migrations"
```

```bash
php artisan migrate
```

## Insertar los datos

```bash
php artisan feco:install
```

## Variables de entorno

```bash
FECO_TEST=true # true o false
FECO_SOFTWARE_IDENTIFIER=identificador_del_software
FECO_SOFTWARE_TEST_SET_ID=id_del_conjunto_de_pruebas
FECO_SOFTWARE_PIN=pin_del_software

FECO_CERTIFICATE_PATH=ruta_del_certificado
FECO_CERTIFICATE_PASSWORD=clave_del_certificado

FECO_PATH=ruta_donde_se_guardaran_los_archivos
FECO_TECHNICAL_KEY=clave_tecnica
```

## Ejemplos

### Obtener el rango de numeración

```php
use DazzaDev\LaravelFeco\Facades\LaravelFeco;

$numberingRange = LaravelFeco::getNumberingRange('nit_emisor');
```

### Generar un documento electrónico (factura, nota de crédito o nota de débito)

Para conocer la estructura de los datos de, puedes consultar la [dazza-dev/dian-xml-generator](https://www.github.com/dazza-dev/dian-xml-generator).

```php
use DazzaDev\LaravelFeco\Facades\LaravelFeco;

$client = LaravelFeco::getClient();
$client->setDocumentType('invoice'); // invoice, support-document, credit-note o debit-note
$client->setDocumentData($documentData);
$invoice = $client->sendDocument();
```

### Obtener los listados

La DIAN tiene una lista de códigos que este paquete te pone a disposición para facilitar el trabajo de consultar esto en el anexo técnico de la DIAN:

```php
$client = LaravelFeco::getClient();
$listings = $client->getListings();
$listingByType = $client->getListing('identification-types');
```

### Emitir Eventos

La estructura de los datos del evento la puedes encontrar en: [dazza-dev/dian-xml-generator](https://github.com/dazza-dev/dian-xml-generator).

```php
$client = LaravelFeco::getClient();
$client->setEventCode('030'); // Consultar listado de eventos
$client->setEventData($eventData); // Datos del evento

$document = $client->sendEvent();
```

### Obtener los eventos de un documento

Después de enviar un documento electrónico, puedes obtener los eventos de ese documento asi:

```php
$client = LaravelFeco::getClient();
$events = $client->getStatusEvent('cufe/cude_documento');
```

## Contribuciones

Las contribuciones son bienvenidas. Si encuentras algún error o tienes ideas para mejoras, por favor abre un issue o envía un pull request. Asegúrate de seguir las pautas de contribución.

## Autor

Laravel Feco fue creado por [DAZZA](https://github.com/dazza-dev).

## Licencia

Este proyecto está licenciado bajo la [MIT License](https://opensource.org/licenses/MIT).
