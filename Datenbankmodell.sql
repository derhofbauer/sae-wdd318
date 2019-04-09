-- #####
-- SHOP
-- #####

+ Users
  + id * (int, ai)
  + name * (varchar)
  + email * (varchar)
  + password * (varchar)
  + birthday (date)
  + phone (varchar)
+ Products
  + id * (int, ai)
  + name * (varchar)
  + price * (double)
  + stock * (int)
  + description (text)
  + images (text)
+ Address
  + id * (int, ai)
  + street * (varchar)
  + streetNr * (varchar)
  + door (varchar)
  + zip * (varchar)
  + city * (varchar)
  + country * (varchar)
  + name (varchar)
  + user_id * (int)
+ Carts
  + id * (int, ai)
  + product_id * (int)
  + quantity * (int) 
  + user_id * (int)
+ Orders
  + id * (int, ai)
  + total_price * (double)
  + delivery_address_id * (int)
  + invoice_address_id * (int)
  + user_id * (int)
  + crdate * (timestamp)
  + products * (text) -- serialized cart
  + status * (enum) -- offen, in bearbeitung, versandt, storniert, zugestellt
+ AdminUsers
  + id * (int, ai)
  + email * (varchar)
  + password * (varchar)