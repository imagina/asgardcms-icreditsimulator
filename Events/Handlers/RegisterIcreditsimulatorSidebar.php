<?php

namespace Modules\Icreditsimulator\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterIcreditsimulatorSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('icreditsimulator::common.title.ICreditSimulator'), function (Item $item) {
                $item->icon('fa fa-briefcase');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );

                $item->item(trans('icreditsimulator::clientcredits.title.clientcredits'), function (Item $item) {
                    $item->icon('fa fa-users');
                    $item->weight(0);
                    // $item->append('admin.icreditsimulator.clientcredit.create');
                    $item->route('admin.icreditsimulator.clientcredit.index');
                    $item->authorize(
                        $this->auth->hasAccess('icreditsimulator.clientcredits.index')
                    );
                });
// append



            });
        });

        return $menu;
    }
}
