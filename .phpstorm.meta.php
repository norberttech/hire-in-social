<?php
namespace PHPSTORM_META
{
    override(\Psr\Container\ContainerInterface::get(0), map([
        '' => '@',
    ]));

    override(\Symfony\Component\DependencyInjection\ContainerInterface::get(0), map([
        '' => '@',
    ]));

    override(\HireInSocial\Component\CQRS\System::query(0), map([
        '' => '@',
    ]));
}