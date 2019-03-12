USE sampleDB_JKTVR18

ALTER TABLE works_on ADD CONSTRAINT FK_project FOREIGN KEY (project_no) REFERENCES project(project_no)

DROP PROC KeyUpdate
CREATE PROC KeyUpdate
	@new AS CHAR(3),
	@before AS CHAR(3)
AS
	BEGIN
		UPDATE project
		SET project_no = @new
		WHERE project_no = @before
		IF @@ERROR = 547 
			BEGIN
			PRINT N'Ошибка. Запускаю каскадное обновление данных'
			ALTER TABLE works_on DROP CONSTRAINT FK_project
			ALTER TABLE works_on ADD CONSTRAINT FK_project FOREIGN KEY (project_no) REFERENCES project(project_no) ON UPDATE CASCADE
			UPDATE project
			SET project_no = @new
			WHERE project_no = @before
			ALTER TABLE works_on DROP CONSTRAINT FK_project
			ALTER TABLE works_on ADD CONSTRAINT FK_project FOREIGN KEY (project_no) REFERENCES project(project_no)
			DECLARE @rows INT
			SET @rows = (SELECT COUNT(project_no)
						FROM works_on
						WHERE project_no = @new)
			PRINT N'В таблице work_on обновлено строк: ' + CAST(@rows AS CHAR(5))
			END
	END
GO

EXEC KeyUpdate
	@before='p4',
	@new='p1'

SELECT * FROM project
SELECT * FROM works_on