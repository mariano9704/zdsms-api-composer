# zdSMS para Laravel

Envíe SMS a móviles cubanos.
Esta librería consume la API de https://zdsms.cu
## Configuración
## Instalación desde composer
Instale el respositorio desde composer
```
    composer require zonadigital/zdsms
```
Una vez instalado, debe establecer en su fichero .env el token persistente:
```
    ZDSMS_PERSISTENT_TOKEN="Su token persistente aqui"
```

### Generar token persistente
Acceda a su cuenta en zdSMS, vaya a Tokens y cree uno nuevo. Establezca un nombre y copie la información que le devuelve el formulario.

#### Nota: Es importante que almacene el token antes de cerrar el formulario, pues solo lo mostraremos una vez. Si lo perdiera, deberá revocarlo y crear uno nuevo.

## Uso
Llame a la librería desde su proyecto:
```
    use ZonaDigital\zdSMS;
```

#### Importante saber
- Si falla la conexión hacia nuestros servidores, la llamada devolverá "false" y escribirá en el fichero laravel.log el error ocurrido. 
- Consulte los valores de retorno de las funciones en la documentación de la API: https://zdsms.cu/documentation

#### Obtener la información del usuario
```
    return zdSMS::me();
```
#### Obtener el crédito del usuario
```
    return zdSMS::credit();
```

#### Enviar SMS
```
    return zdSMS::sendSMS("53XXXXXXXX", "Mensaje enviado desde zdSMS");
```
Si se entrega a zdSMS, devuelve el ID del mensaje.

#### Consultar los detalles de un SMS
```
    return zdSMS::sms_status("id_del_sms");
```

#### Enviar Campaña
```
    return zdSMS::sendSMS("Nombre de la campaña",['535xxxxxxx', '5355xxxxxx'], "Mensaje a enviar");
```
Si se entrega a zdSMS, devuelve el ID de la campaña.

#### Consultar los detalles de una campaña
```
    return zdSMS::campaign_status("id_de_campaña");
```
## Autores

- [Zona Digital S.R.L](https://twitter.com/zdencuba)
- [Mariano A. Ochoa Poveda](https://twitter.com/arturo9704)

## Soporte

Si necesita ayuda, contáctenos: soporte@zonadigital.cu

