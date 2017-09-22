# Otel Envanter Arama API'si
Bu API, bir otelde oda ayırtmak isteyen kişiler için belirli tarih aralığında kişi sayısına uygun odaların fiyatlarını göstermektedir.

Verilere erişmenin yolu aşağıdaki örnekteki gibidir:

```
/hotels?checkIn=2017-05-05&checkOut=2017-05-08&pax=2
```

Buradaki parametrelerin anlamı:

* **checkIn** - Otele giriş tarihi
* **checkOut** - Otelden çıkış tarihi
* **pax** - Odada kalacak kişi sayısı

API'ye erişildiği zaman çift ve tek kişilik odaların fiyatlarını JSON formatında döndürür. Örnek bir sonuç şu şekildedir:

```
[{"roomCode":"STDSNGL","price":147.5},{"roomCode":"STDDBL","price":72}]
```

