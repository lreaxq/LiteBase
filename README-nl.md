# LiteBase: Eenvoudig PHP-gebaseerd Databasesysteem

LiteBase is een eenvoudig PHP-gebaseerd databasesysteem. Het slaat gegevens op met behulp van een op bestanden gebaseerde aanpak en biedt basisfuncties van een database.

## Kenmerken

- Basis databasefuncties: LiteBase biedt basis databasefuncties zoals opslaan, ophalen, bijwerken en verwijderen van gegevens.
- Bestandsgebaseerde gegevensopslag: Gegevens worden opgeslagen met behulp van een op bestanden gebaseerde aanpak, wat installatie en gebruik vereenvoudigt.
- Foutafhandeling: LiteBase behandelt foutomstandigheden en geeft feedback aan de gebruiker.

## Installatie

1. Download de LiteBase-bestanden.
2. Upload de bestanden naar je server.
3. Geweldig, nu kun je LiteBase op je site gebruiken.
4. Om toegang te krijgen tot het beheerderspaneel, ga eenvoudig naar het adres `example.com/mylitebase`. Het standaardwachtwoord is `123`.

## Gebruik

LiteBase kan worden gebruikt met de volgende basisfuncties:

- `litebase_get('tabelnaam', 'woord', 'kolom')`: Haalt de kolom op die het opgegeven woord bevat uit de tabel.
- `litebase_insert('tabelnaam', 'gegevens')`: Voegt de opgegeven gegevens in in de tabel.
- `litebase_delete('tabelnaam', 'woord', 'kolom')`: Verwijdert de kolom die het opgegeven woord bevat uit de tabel.
- `litebase_getLine('tabelnaam', 'rij')`: Gebruikt om een specifieke rij op te halen.
- `litebase_dump('tabelnaam')`: Gebruikt om de volledige tabel van de database op te halen.

## Voorbeeldgebruik

```php
<?php
// Voorbeeldgebruik van LiteBase

// Inclusief LiteBase-bibliotheken
include("/LiteBase/LiteBase-1.0.php");

// Databestand en tabelnaam
$database = 'mijn_database';
$table = 'mijn_tabel';

// Voorbeeld voor het toevoegen van gegevens
$data = 'John Doe,30,New York';

// Voeg de gegevens toe
$result = litebase_insert($table, $data);

// Controleer het resultaat
if ($result) {
    echo "Gegevens succesvol toegevoegd.";
} else {
    echo "Er is een fout opgetreden bij het toevoegen van gegevens.";
}
?>
