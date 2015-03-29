<?php

namespace JGM\TableBundle\Table\Column;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use JGM\TableBundle\Table\Row\Row;

/**
 * This column will call the __toString method of an entity.
 *
 * @author	Jan Mühlig <mail@janmuehlig.de>
 * @since	1.0
 */
class EntityColumn extends AbstractColumn
{
	protected function setDefaultOptions(OptionsResolverInterface $optionsResolver)
	{
		parent::setDefaultOptions($optionsResolver);
		
		$optionsResolver->setDefaults(array(
			'empty_value' => null
		));
	}
	
	public function getContent(Row $row)
	{
		$value = $row->get($this->getName());
		
		if($value === null)
		{
			return $this->options['empty_value'];
		}
		
		return $value->__toString();
	}
}
