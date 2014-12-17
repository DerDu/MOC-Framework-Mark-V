<?php
namespace {
    trait TFoo
    {

    }

    class CFoo
    {

        use TFoo;
    }
}

namespace Foo {
    trait TBar
    {

    }

    trait TFooBar
    {

    }

    interface IBar
    {

    }

    class CBar implements IBar
    {

        use TBar;
        use TFooBar;
    }
}
