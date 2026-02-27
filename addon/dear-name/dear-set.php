<?php

			if ( $call_company !== '' ) {
				$thanks_body_head .= $this->company_before.$call_company.$this->company_after.PHP_EOL;
			}
			
			if ( $call_name !== '' ) {
				$thanks_body_head .= $this->name_before.$call_name.$this->name_after.PHP_EOL;
			}
			
			if ( $call_company !== '' || $call_name !== '' ) {
				$this->thanks_body  = $thanks_body_head.$this->thanks_body;
			}
