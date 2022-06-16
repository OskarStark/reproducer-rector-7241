# reproducer-rector-7241

For https://github.com/rectorphp/rector/issues/7241

When executing `make refactoring` via rector, it should keep the used trait in the enum ❗

### Current diff

```diff
diff --git a/src/Enum/Gender.php b/src/Enum/Gender.php
index 0715028..42ea459 100644
--- a/src/Enum/Gender.php
+++ b/src/Enum/Gender.php
@@ -6,16 +6,8 @@ namespace App\Enum;

 use MyCLabs\Enum\Enum;

-/**
- * @method static Gender MALE()
- * @method static Gender FEMALE()
- *
- * @phpstan-extends Enum<\App\Enum\Gender>
- */
-final class Gender extends Enum
+enum Gender : string
 {
-    use EqualsTrait;
-
-    private const MALE = 'male';
-    private const FEMALE = 'female';
+    case MALE = 'male';
+    case FEMALE = 'female';
 }
```

### Expected diff

```diff
diff --git a/src/Enum/Gender.php b/src/Enum/Gender.php
index 0715028..6f89b39 100644
--- a/src/Enum/Gender.php
+++ b/src/Enum/Gender.php
@@ -6,16 +6,10 @@ namespace App\Enum;

 use MyCLabs\Enum\Enum;

-/**
- * @method static Gender MALE()
- * @method static Gender FEMALE()
- *
- * @phpstan-extends Enum<\App\Enum\Gender>
- */
-final class Gender extends Enum
+enum Gender : string
 {
     use EqualsTrait;

-    private const MALE = 'male';
-    private const FEMALE = 'female';
+    case MALE = 'male';
+    case FEMALE = 'female';
 }
```

NOTE, that it still keeps the trait!
