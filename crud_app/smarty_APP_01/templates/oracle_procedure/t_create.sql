CREATE OR REPLACE PROCEDURE CREATE_USER(
    NEW_NAME IN VARCHAR2, -- 引数 インプット
    NEW_EMAIL IN VARCHAR2 -- 引数 インプット
) AS
 --- インサート処理
BEGIN
    INSERT INTO TEST01_USERS (
        NAME,
        EMAIL
    ) VALUES (
        NEW_NAME,
        NEW_EMAIL
    );
END CREATE_USER;