SELECT
    CONCAT(H.hacker_id, "  ", H.name)
FROM
    Hackers H
    JOIN Submissions S ON S.hacker_id = H.hacker_id
    JOIN Challenges C ON C.challenge_id = S.challenge_id
    JOIN Difficulty D ON D.difficulty_level = C.difficulty_level AND D.score = S.score
GROUP BY
    H.hacker_id,
    H.name
HAVING
    COUNT(H.hacker_id)  > 1
ORDER BY
    COUNT(H.hacker_id)  DESC,
    H.hacker_id;