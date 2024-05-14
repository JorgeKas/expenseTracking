<?php

use Core\Container;

test('it can resolve something out of the container', function () {
    // arrange

        $container = new Container();

    $container->bind('foo', function () {
        return 'bar';
    }); 

    // act -> perform the action
    $result = $container->resolve('foo');

    // assert / expect -> confirm whether it works or not
    expect($result)->toEqual('bar');

});