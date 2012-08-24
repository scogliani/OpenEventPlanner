<?php
namespace DoodlePlus\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

use Doctrine\ORM\EntityRepository;

class EventAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
			->add('location')
			->add('description', null, array('required' => false))
			->add('datetimeBegin', 'date', array(
				'widget' => 'single_text',
				'input' => 'datetime',
				'format' => 'MM/dd/yyyy hh:mm',
				'attr' => array('class' => 'datetimeBegin'),
			))
			->add('datetimeEnd', 'date', array(
                                                'widget' => 'single_text',
                                                'input' => 'datetime',
                                                'format' => 'MM/dd/yyyy hh:mm',
                                                'attr' => array('class' => 'datetimeEnd'),
												'required' => false
                                                ))
			->add('hasPrice', null, array(
											'required' => false,
											'label' => 'Price',
											'attr' => array('class' => 'hasPrice')
											))
			->add('price', 'money', array(
											'required' => false,
											'grouping' => true,
											'attr' => array('class' => 'price'),
											'label' => ' '
										))
										
			->add('technicalUser', null, array('required' => false))
			->add('organizersGroup', null)
			->add('eventGroup', null, array('required' => false))
			->add('guestGroup')
			->add('emailGuest', 'entity', array(
			'class' => 'DoodlePlusEmailBundle:Email',
			'query_builder' =>
			function(EntityRepository $er) {
				return $er->createQueryBuilder('e')
					->where("e.type = 'Guest'");
			}
			))
			->add('aPrioriGroup', null)
			->add('emailAPriori', 'entity', array(
			'class' => 'DoodlePlusEmailBundle:Email',
			'query_builder' =>
			function(EntityRepository $er) {
				return $er->createQueryBuilder('e')
					->where("e.type = 'APriori'");
			}
			))
			->add('send', 'date', array(
                                                'widget' => 'single_text',
                                                'input' => 'datetime',
                                                'format' => 'MM/dd/yyyy hh:mm',
                                                'attr' => array('class' => 'datetimeBegin'),
												'required' => false
                                                ))
			->add('hasResend', null, array(
											'required' => false,
											'label' => 'Resend',
											'attr' => array('class' => 'hasResend')
											))
			->add('resend1', 'date', array(
                                                'widget' => 'single_text',
                                                'input' => 'datetime',
                                                'format' => 'MM/dd/yyyy hh:mm',
                                                'attr' => array('class' => 'datetimer1Begin'),
												'required' => false
                                                ))
			->add('resend2', 'date', array(
                                                'widget' => 'single_text',
                                                'input' => 'datetime',
                                                'format' => 'MM/dd/yyyy hh:mm',
                                                'attr' => array('class' => 'datetimer2Begin'),
                                                'required' => false
												))
			->add('openGuestsGuest', null, array('required' => false, 'attr' => array ('class' =>'hasGuests')))
			->add('withSo', 'choice', array(
				'attr' => array('class' => 'withSo'),
				'required' => false,
				'label' => ' ',
				'choices' => array(
					"Partner" => "Partner",
					"Guests" => "Guests"
					), "expanded" => true, "multiple" => false
				)
			)
			->add('openExternGuest', null, array(
				'required' => false,
				'label' => 'Externs',
				'attr' => array('class' => 'hasExtern')
			))
			->add('dateReport', 'date', array(
                                                'widget' => 'single_text',
                                                'input' => 'datetime',
                                                'format' => 'MM/dd/yyyy hh:mm',
                                                'attr' => array('class' => 'dateReport'),
                                                ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
			->add('location')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
			->add('location')
			->add('datetimeBegin')
			->add('datetimeEnd')
			->add('price')
			->add('technicalUser')
			->add('organizersGroup')
			->add('eventGroup')
			->add('guestGroup')
			->add('aPrioriGroup')
			->add('send')
			->add('resend1')
			->add('resend2')
			->add('withSo')
			->add('openExternGuest')
			->add('dateReport')
        ;
    }
	
	public function validate(ErrorElement $errorElement, $object)
    {
		return true;
    }
}
?>