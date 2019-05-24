SELECT
    X,
    Y
FROM (
    SELECT
        X,
        Y
    FROM
        Functions
    WHERE
            X = Y
    GROUP BY
        X, Y
    HAVING
            COUNT(*) > 1
    UNION
    SELECT
        F1.X,
        F1.Y
    FROM
        Functions F1
        JOIN Functions F2 ON F1.X = F2.Y AND F1.Y = F2.X AND F1.X <> F1.Y
    WHERE
        F1.X < F1.Y
    GROUP BY
        F1.X,
        F1.Y
) TMP
ORDER BY
    X;