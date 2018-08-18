# connect-holland
Opdrachten van Connect Holland


We vragen om een wiskundig probleem om te zetten naar code en een om een 
oplossingsrichting voor een deel van een applicatie te schetsen.

Priemgetallen optellen

The prime 41, can be written as the sum of six consecutive primes:

41 = 2 + 3 + 5 + 7 + 11 + 13

This is the longest sum of consecutive primes that adds to a prime below 
one-hundred.

The longest sum of consecutive primes below one-thousand that adds to a prime, 
contains 21 terms, and is equal to 953.

Which prime, below one-million, can be written as the sum of the most 
consecutive primes?

Ontwikkelen een functie/algoritme die 1 argument (int) accepteert en vervolgens 
de 'longest sum of consecutive primes that adds to a prime below that number' 
print. Ik besef me dat dit een ingewikkeld probleem kan zijn en het misschien 
niet lukt om iets te maken dat (altijd) werkt. In dat geval zie ik graag een 
git commit history met verschillende pogingen.

Bonusvraag: hoe zou je hiervoor een unit test ontwikkelen?


Incomplete API
 
Stel we ontwikkelen een applicatie voor een klant waarbij we een koppeling 
moeten leggen met een extern systeem. We moeten data in onze database vullen 
en updaten aan de hand van wat er in dat externe systeem staat, maar hebben 
niet alle informatie uit het externe systeem nodig. De API van het externe 
systeem bevat helaas niet alle functies die we graag zouden zien (we kunnen 
bijvoorbeeld niet filteren of zoeken), we hebben alleen de beschikking over 
de volgende endpoints:
 
- /api/companies: geeft een overzicht van alle bedrijven in het externe systeem 
met een id en een naam, m.b.v. pagination (page=X) kan je alle gegevens 
bereiken.
- /api/company/{id}: geeft details van een bedrijf: sector, kamer van koophandel 
nummer en website
- /api/company/{id}/offices: geeft een overzicht van alle vestigingen van een 
bedrijf: bezoekadres: straat, huisnummer, postcode, plaats en hetzelfde voor 
eventueel postadres (maar die kan ook ontbreken)
- /api/company/{id}/office/{id}/employees: geeft een overzicht van werknemers 
op een vestiging: foto (base64 encoded en gemiddeld 100KB), naam, e-mailadres 
en functie
 
In het externe systemen staan zo'n 50,0000 bedrijven, met totaal 300,000 
vestigingen en meer 2 miljoen werknemers. In onze applicatie moeten we de 
volgende tabel vullen met alle werknemers die accountmanager of salesmanager 
zijn: employee_id, naam, e-mailadres, foto, bezoekadres, bedrijfsnaam, website, 
sector
 
Schets een oplossing voor het ontwikkelen van deze API, waarbij je rekening 
houdt met:
 
- Geheugengebruik (als je van alle 2 miljoen werknemers de foto's in je geheugen 
hebt is dat geen werkbare oplossing)
- Foutafhandeling (dit zal een langlopend proces zijn en als er ergens iets fout 
gaat, wat ook bij de API kan liggen, wil je niet elke keer helemaal opnieuw 
moeten beginnen)
- Structuur; hoe hou je de code overzichtelijk, onderhoudbaar en welke design 
patterns zou je toepassen?
- Updates; hoe verwerk je wijzigingen die in het externe systeem worden gedaan?
 
Bonusvraag: het is mogelijk om in het externe systeem 1 extra endpoint te laten 
ontwikkelen, welke zou je kiezen en waarom?