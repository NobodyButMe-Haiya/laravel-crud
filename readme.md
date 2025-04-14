# Laravel 12 Simple CRUD Example

This is a **simple sample CRUD** application built using **Laravel 12**.  
It demonstrates basic Create, Read, Update, and Delete operations on a `person` table.

---

## 🗄️ Database Structure

The application uses the following table:

```sql
CREATE TABLE `person` (
  `personId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`personId`)
) ENGINE=InnoDB AUTO_INCREMENT=18;
```

---

## 🧪 Dummy Data

You can use the following SQL to insert some initial dummy records:

```sql
INSERT INTO `person` (`name`, `age`) VALUES
('Alice Johnson', 28),
('Bob Smith', 34),
('Charlie Brown', 22),
('Diana Prince', 30),
('Ethan Hunt', 40);
```

---

## 🚀 Features

- List all persons
- Add a new person
- Edit an existing person
- Delete a person
- Built with clean Laravel 12 structure and MVC

---

## ⚙️ Requirements

- PHP >= 8.1
- Composer
- MySQL
- Laravel 12

---

** this might be diff then standard they call index ?  We stick to our rule .. add / read/ update /remove.  