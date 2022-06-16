# reproducer-rector-7240

For https://github.com/rectorphp/rector/issues/7240

When executing `make refactoring` via rector, it should also update the `EnumCommand.php` file ❗

Available and correct diff:
```diff
diff --git a/src/Enum/Gender.php b/src/Enum/Gender.php
index dc3048a..42ea459 100644
--- a/src/Enum/Gender.php
+++ b/src/Enum/Gender.php
@@ -6,14 +6,8 @@ namespace App\Enum;

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
-    private const MALE = 'male';
-    private const FEMALE = 'female';
+    case MALE = 'male';
+    case FEMALE = 'female';
 }
```

but the following is missing:
```diff
diff --git a/src/Command/EnumCommand.php b/src/Command/EnumCommand.php
index 1dc9e87..bdeae08 100644
--- a/src/Command/EnumCommand.php
+++ b/src/Command/EnumCommand.php
@@ -19,8 +19,8 @@ final class EnumCommand extends Command
     {
         $io = new SymfonyStyle($input, $output);

-        $io->text(get_class(Gender::MALE()));
-        $io->text(Gender::MALE()->getValue());
+        $io->text(get_class(Gender::MALE));
+        $io->text(Gender::MALE->value);

         return Command::SUCCESS;
     }
```
