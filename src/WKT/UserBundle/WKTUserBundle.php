<?php

namespace WKT\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WKTUserBundle extends Bundle
{
	public function getParent()
	{
	  return 'FOSUserBundle';
	}
}
