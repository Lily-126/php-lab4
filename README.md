# COSC213 PHP Lab: Expressions and Control Flow






NOTES ON '==' and '===':


== (Loose Equality): Performs type coercion, meaning it converts values to the same type before comparing. We use this when we want flexible comparisons, but it's risky for user inputs or mixed types.

=== (Strict Equality): Checks both value and type without coercion. Prefer === for security and accuracy, especially in conditionals, form validation, or when dealing with GET/POST data to avoid bugs from type mismatches.

When to Choose: Use === by default for comparisons involving variables from external sources (like $_GET). Reserve == for cases where coercion is intentional.
