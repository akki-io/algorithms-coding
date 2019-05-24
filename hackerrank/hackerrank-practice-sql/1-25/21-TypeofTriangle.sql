SELECT
    CASE
        WHEN A + B > C AND B + C > A AND A + C > B
            THEN
                CASE
                    WHEN (A = B AND B <> C)
                        OR (B = C AND C <> A)
                        OR (A = C AND C <> B) THEN "Isosceles"
                    WHEN A = B AND B = C THEN "Equilateral"
                    ELSE "Scalene"
                END
        ELSE "Not A Triangle"
    END
FROM
    TRIANGLES;