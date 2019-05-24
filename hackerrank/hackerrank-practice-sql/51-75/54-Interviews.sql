SELECT
    Contests.contest_id,
    Contests.hacker_id,
    Contests.name,
    IFNULL(SUM(SS.total_submissions), 0) AS sum_total_submissions,
    IFNULL(SUM(SS.total_accepted_submissions), 0) AS sum_total_accepted_submissions,
    IFNULL(SUM(VS.total_views), 0) AS sum_total_views,
    IFNULL(SUM(VS.total_unique_views), 0) AS sum_total_unique_views
FROM
    Contests
    JOIN Colleges ON Contests.contest_id = Colleges.contest_id
    JOIN Challenges ON Challenges.college_id = Colleges.college_id
    LEFT JOIN (
        SELECT
            challenge_id,
            SUM(total_views) total_views,
            SUM(total_unique_views) total_unique_views
        FROM
            View_Stats
        GROUP BY
            challenge_id
    ) VS ON VS.challenge_id = Challenges.challenge_id
    LEFT JOIN (
        SELECT
            challenge_id,
            SUM(total_submissions) total_submissions,
            SUM(total_accepted_submissions) total_accepted_submissions
        FROM
            Submission_Stats
        GROUP BY
            challenge_id
    ) SS ON SS.challenge_id = Challenges.challenge_id
GROUP BY
    Contests.contest_id,
    Contests.hacker_id,
    Contests.name
HAVING
    sum_total_submissions > 0
    OR sum_total_accepted_submissions > 0
    OR sum_total_views > 0
    OR  sum_total_unique_views > 0
ORDER BY
    Contests.contest_id;