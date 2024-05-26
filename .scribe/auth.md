# Authenticating requests

To authenticate requests, include an **`Authorization`** header with the value **`"Bearer {YOUR_AUTH_KEY}"`**.

All authenticated endpoints are marked with a `requires authentication` badge in the documentation below.

You can retrieve your token go to "https://apiproject/api/v1/auth/login" and pass the data into there.
