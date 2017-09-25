# Otel Envanter Arama API'si
Bu API, bir otelde oda ayırtmak isteyen kişiler için belirli tarih aralığında kişi sayısına uygun odaların fiyatlarını göstermektedir. Laravel Framework ve MySQL kullanılarak hazırlanmıştır.

Verilere erişmenin yolu aşağıdaki örnekteki gibidir:

```
/hotels?checkIn=2017-05-05&checkOut=2017-05-08&pax=2
```

Buradaki parametrelerin anlamı:

* **checkIn** - Otele giriş tarihi
* **checkOut** - Otelden çıkış tarihi
* **pax** - Odada kalacak kişi sayısı

API'ye erişildiği zaman çift ve tek kişilik uygun odaların fiyatlarını eğer ki herhangi bir odanın allotment değeri 0 değilse ve kişi sayısı uygunsa JSON formatında döndürür. Örnek bir sonuç şu şekildedir:

```
[{"roomCode":"STDSNGL","price":147.5},{"roomCode":"STDDBL","price":72}]
```

**Not:** Projeyi çalıştırmak için sistemde PHP 7+, Laravel ve MySQL kurulu olmalıdır. 

#### Projeyi çalıştırma adımları
1. Örnek tabloyu oluşturmak için bir veritabanında import.sql dosyası kullanılabilir. Bunun için phpMyAdmin kullanabilirsiniz.
2. Tablo oluştuktan sonra kaynak koddaki .env dosyasında veritabanının adı,adresi,kullanıcı adı ve şifresi ayarlanmalıdır, böylece programın veri çekebilme yetkisi olur.
3. Bu adımda server başlatılacak. Daha sonra Linux sisteminde terminal, Windows'ta ise komut istemi kullanarak 
```
php artisan serve
```
yazıp Enter tuşuna basarsanız server başlar. Servera http://localhost:8000/ adresinden erişebilirsiniz.

4. Artık API çalışır durumda! Yukarıdaki parametreleri girerseniz verileri rahatlıkla alabilirsiniz.
