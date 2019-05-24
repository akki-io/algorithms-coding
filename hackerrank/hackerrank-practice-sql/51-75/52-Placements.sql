SELECT
    S.Name
FROM
    Students S
    JOIN Friends F ON F.ID = S.ID
    JOIN Packages SP ON SP.ID = S.ID
    JOIN Packages BFP ON BFP.ID = F.Friend_ID
WHERE
    BFP.Salary > SP.Salary
ORDER BY
    BFP.Salary;