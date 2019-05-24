SELECT
    W.id,
    WP.age,
    tmp.coins_needed,
    W.power
FROM
    Wands W
    JOIN Wands_Property WP ON WP.code = W.code
    JOIN (
        SELECT
            WP.age,
            W.power,
            MIN(W.coins_needed) AS coins_needed
        FROM
            Wands W
            JOIN Wands_Property WP ON WP.code = W.code AND WP.is_evil = 0
        GROUP BY
            WP.age,
            W.power
    ) tmp ON tmp.coins_needed = W.coins_needed AND tmp.age = WP.age AND tmp.power = W.power
ORDER BY
    W.power DESC,
    WP.age DESC;