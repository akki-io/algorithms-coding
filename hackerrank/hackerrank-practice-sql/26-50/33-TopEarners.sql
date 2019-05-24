SELECT
    CONCAT(earnings, "  ", employeeCount)
FROM (
    SELECT
        months*salary AS earnings,
        COUNT(employee_id) AS employeeCount
    FROM
        Employee
    GROUP BY
        months*salary
    ORDER BY
        months*salary DESC
    limit 1
) AS tmp;