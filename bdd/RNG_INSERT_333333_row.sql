CREATE DEFINER=`root`@`localhost` PROCEDURE `test`()
    MODIFIES SQL DATA
    DETERMINISTIC
BEGIN

SET @RowCount = 0;
-- SET @RngSupport = 0;
SET @RngKey = 0;
SET @UpperSup = 0;
SET @LowerSup = 0;
SET @UpperKey = 0;
SET @LowerKey = 0; 



SET @UpperSup      = 4256;
SET @LowerSup      = 1;
SET @UpperKey      = 241;
SET @LowerKey      = 1;



WHILE  @RowCount < 30000
DO 
	
	-- SET @RngSupport = ROUND(((@UpperSup - @LowerSup -1) * RAND() + @LowerSup), 0);
	SET @RngKey     = ROUND(((@UpperKey - @LowerKey -1) * RAND() + @LowerKey), 0);

	INSERT INTO `link`(
		`id_support`,
		`id_key`
	) 
	VALUES (
		@UpperSup - (@RowCount % @UpperSup + 1),
		@RngKey
	);

	SET @RowCount = @RowCount + 1;
END WHILE;

END