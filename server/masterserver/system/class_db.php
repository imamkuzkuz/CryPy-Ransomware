<?php

class mysql
{
	var $db_link;
	var $result;
	var $mysql_flag = MYSQL_ASSOC; // MYSQL_BOTH or MYSQL_ASSOC or MYSQL_NUM

	//Sets up database link using variables from a config file
	function __construct( $dbhost = '', $dbname = '', $dbuser = '', $dbpassword = '' )
	{
		$this->db_link = @mysql_connect( $dbhost, $dbuser, $dbpassword, true ) or die( 'Error: Tidak Bisa Konek ke Database: '.mysql_error() );
		mysql_select_db( $dbname, $this->db_link ) or die( 'Error: Tidak bisa memilih Database: '.mysql_error() );
	}

	// Preform any sql query
	function go( $query = NULL, $ref = 0 )
{
		$this->use_log = 'go:';
		if( $query != NULL )
		{
			$this->result[$ref] = @mysql_query( $query, $this->db_link ) or die('Error: Database Query Error<br><br>'.mysql_error().'<hr/>'.$query);
			return $this->result[$ref];
		} else
			return false;
		
	}
	
	// Return array with one result
	function fetchArray( $ref = 0 )
	{
		if( isset( $this->result[$ref] ) && !( empty( $this->result[$ref] ) ) )
			return @mysql_fetch_array( $this->result[$ref], $this->mysql_flag );
		else
			return false;
		
	}
	
	// Return an array with all the results
	function fetchAll( $ref = 0 )
	{
		if( isset( $this->result[$ref] ) && !( empty( $this->result[$ref] ) ) )
		{
            $result = array();
			while( $a = @mysql_fetch_array( $this->result[$ref], $this->mysql_flag ) )
			{
				$result[] = $a;
			}
			return $result;
		} else
			return false;
	}
	
	// Number of rows returned from last called query
	function numRows( $ref = 0 )
	{
		if( isset( $this->result[$ref] ) && !( empty( $this->result[$ref] ) ) )
		{
			return @mysql_num_rows( $this->result[$ref] );
		} else
			return false;

	}
	
	// Number of affectedrows returned from last called query
	function affectedRows( $ref = 0 )
	{
		if( isset( $this->result[$ref] ) && !( empty( $this->result[$ref] ) ) )
		{
			return @mysql_affected_rows( $this->result[$ref] );
		} else
			return false;
	}
	
	// Return the last queries insert id
	function lastId()
	{
		return @mysql_insert_id();
	}
	
	// Clear a query result from the class
	function clearResult( $ref = 0 )
	{
		if( isset( $this->result[$ref] ) && !( empty( $this->result[$ref] ) ) )
		{
			if( @mysql_free_result( $this->result[$ref] ) ) 
				$clear = true;
			unset( $this->result[$ref] );
			if( isset( $clear ) )
				return true;
			else
				return false;
		} else
			return false;
	}
	
	// Closes database connection
	function close()
	{
		if( isset( $this->db_link ) && !( empty( $this->db_link ) ) )
			if( @mysql_close( $this->db_link ) )
				return true;
			else
				return false;
		else
			return false;
	}
    
    function q($val = '')
    {
        if(!$escaped = mysql_real_escape_string($val))
        {
            $escaped = str_replace(array("\x00", "\n", "\r", '\\', "'", '"', "\x1a"), array('\x00', '\n', '\r', '\\\\' ,"\'", '\"', '\x1a'), $val);
        }
        
        return $escaped;
    }
}


?>