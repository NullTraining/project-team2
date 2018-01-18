# Lost and found aplikacija:

Use case: našao sam/tražim ključeve/rukavice/novčanik

## Featurei:

Svi korisnici mogu vidjeti Google maps pinove za predmete nađeno/izgubljeno

Korisnik može unijeti dvije forme:

1. Izgubio sam X
Zadnja poznata lokacija u okolici *označiti map area*
Kratki opis

Također može unijeti formu:

2. Našao sam X
Na lokaciji *koordinate*
Slika
Kratki opis gdje je pronađeno i/ili kojim okolnostima ("Ključevi pronađeni u blatu pored adrese X")

**Problem**: handlanje potencijalnih lažnih prijava
Različiti tipovi predmeta mogu imati različite načine handlanja pronalaska

1) novčanik - ako ima osobnih podataka unutra, site može po prijavi 'predmet pronađen' pokušati pronaći kontakt podatke od osobe koja je izgubila i poslati automatski mail
2) predmeti veće intrinzične vrijednosti tipa mobitel, sat - sakriti sliku i tražiti opširniji opis?
3) ključevi - slika uključena, u pravilu ključevi imaju vrijednost samo za osobu koja zna kojim bravama pripadaju, pa slika nije problem
4) novac - nema pametnog načina, možda ne dopustiti prijavu

Email notifikacija kada je na lokaciji blizu vaše tražene pronađen predmet vašeg tipa
Email notifikacija kada netko traži predmet poput onoga koji ste pronašli u nekoj razumnoj blizini
Odjeljivanje setova traženih/nađenih predmeta po naselju
Interni inbox u aplikaciji gdje se može dogovoriti primopredaja, email notifikacija na dospijeće poruka u inbox (što je moguće isključiti).

# project-team2
Team 2 project

To start using Vagrant:

## Step 1
Copy `Vagrantfile.dist` to `Vagrantfile`

- if you dont have NFS, edit line 9 to look like:

```
config.vm.synced_folder ".", "/vagrant"
```
## Step 2
Run `vagrant up`

## Step 3
Add to hosts file (on your laptop) (Linux: /etc/hosts , Mac: /private/etc/hosts, Windows: google :) )
```
10.0.60.80	www.bob.loc
10.0.60.80	test.bob.loc
```

## Step 4
Open `https://www.bob.loc`. It should complain about broken certificate, just allow it. If you see 'Ready to rumble' in your browser, Vagrant setup works!

## Step 5
Copy `.env.dist` to `.env`.
If you don't use Vagrant enter your own database credentials

## Step 6
Run `composer install`

## Step 7
Run migration with command `./bin/console doctrine:migrations:migrate`.
If you run into trouble try
`./bin/console doctrine:schema:drop`
then
`./bin/console doctrine:schema:create`
then run migration again.


## Step 8
Run `./bin/console doctrine:fixtures:load`


