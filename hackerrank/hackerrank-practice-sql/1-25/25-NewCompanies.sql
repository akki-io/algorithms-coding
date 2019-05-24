SELECT
    C.company_code,
    C.founder,
    COUNT(DISTINCT LM.lead_manager_code) AS Lead_Manager_Count,
    COUNT(DISTINCT SM.senior_manager_code) AS Senior_Manager_Count,
    COUNT(DISTINCT M.manager_code) AS Manager_Count,
    COUNT(DISTINCT E.employee_code) AS Employee_Count
FROM
    Company C
    LEFT JOIN Lead_Manager LM ON LM.company_code = C.company_code
    LEFT JOIN Senior_Manager SM ON SM.company_code = C.company_code
    LEFT JOIN Manager M ON M.company_code = C.company_code
    LEFT JOIN Employee E ON E.company_code = C.company_code
GROUP BY
    C.company_code,
    C.founder
ORDER BY
    company_code;