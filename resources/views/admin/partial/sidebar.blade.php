<div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">Navigation</li>

                    <li class="nav-item">
                        <a href="{{route('dashboard')}}" class="nav-link {{url()->current() == route('dashboard') ? 'active': ''}}">
                            <i class="icon icon-speedometer"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.schools')}}" class="nav-link {{url()->current() == route('admin.schools') ? 'active': ''}}">
                            <i class="fa fa-university"></i> Schools
                        </a>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-organization"></i> Shops <i class="fa fa-caret-left"></i>
                        </a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item"><a href="{{ route('admin.shops.index') }}" class="nav-link {{ url()->current() == route('admin.shops.index') ? 'active' : '' }}">
                                <i class="fa fa-minus"></i> All</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('admin.shops.status', 'active') }}" class="nav-link {{url()->current() == route('admin.shops.status', ['status'=>'active']) ? 'active': ''}}">
                                <i class="fa fa-minus"></i> Active</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('admin.shops.status', 'suspended') }}" class="nav-link {{url()->current() == route('admin.shops.status', ['status'=>'suspended']) ? 'active': ''}}">
                                <i class="fa fa-minus"></i> Suspended</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-event"></i> Tickets <i class="fa fa-caret-left"></i>
                        </a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item"><a href="{{ route('admin.orders.index') }}" class="nav-link {{ url()->current() == route('admin.orders.index') ? 'active' : '' }}">
                                <i class="fa fa-minus"></i> All</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('admin.orders.status', 'completed') }}" class="nav-link {{url()->current() == route('admin.orders.status', ['status'=>'completed']) ? 'active': ''}}">
                                <i class="fa fa-minus"></i> Paid</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('admin.orders.status', 'pending') }}" class="nav-link {{url()->current() == route('admin.orders.status', ['status'=>'pending']) ? 'active': ''}}">
                                <i class="fa fa-minus"></i> Pending</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('admin.orders.payment') }}" class="nav-link {{url()->current() == route('admin.orders.payment') ? 'active': ''}}">
                                <i class="fa fa-minus"></i> Payments</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-basket"></i> Items <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{route('admin.items.index')}}" class="nav-link {{url()->current() == route('admin.items.index') ? 'active': ''}}">
                                    <i class="fa fa-minus"></i> All
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.items.status', ['status'=>'active'])}}" class="nav-link {{url()->current() == route('admin.items.status', ['status'=>'active']) ? 'active': ''}}">
                                    <i class="fa fa-minus"></i> Active
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.items.status', ['status'=>'draft'])}}" class="nav-link {{url()->current() == route('admin.items.status', ['status'=>'pending']) ? 'active': ''}}">
                                    <i class="fa fa-minus"></i> Draft
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('admin.items.status', ['status'=>'review'])}}" class="nav-link {{url()->current() == route('admin.items.status', ['status'=>'review']) ? 'active': ''}}">
                                    <i class="fa fa-minus"></i> Review
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.items.status', ['status'=>'expired'])}}" class="nav-link {{url()->current() == route('admin.items.status', ['status'=>'expired']) ? 'active': ''}}">
                                    <i class="fa fa-minus"></i> Expired
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.item.report')}}" class="nav-link {{url()->current() == route('admin.item.report') ? 'active': ''}}">
                                    <i class="fa fa-dashboard"></i> Reports
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-wrench"></i> Services <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{route('admin.service.index')}}" class="nav-link {{url()->current() == route('admin.service.index') ? 'active': ''}}">
                                    <i class="fa fa-minus"></i> All
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.service.pipeline', ['pipeline'=>'active'])}}" class="nav-link {{url()->current() == route('admin.service.pipeline', ['pipeline'=>'active']) ? 'active': ''}}">
                                    <i class="fa fa-minus"></i> Active
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.service.pipeline', ['pipeline'=>'pending'])}}" class="nav-link {{url()->current() == route('admin.service.pipeline', ['pipeline'=>'suspended']) ? 'active': ''}}">
                                    <i class="fa fa-minus"></i> Suspended
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.service.report')}}" class="nav-link {{url()->current() == route('admin.service.report') ? 'active': ''}}">
                                    <i class="fa fa-dashboard"></i> Reports
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-calendar"></i> Events <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{route('admin.events.index')}}" class="nav-link {{url()->current() == route('admin.events.index') ? 'active': ''}}">
                                    <i class="fa fa-minus"></i> All
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.events.pipeline', ['pipeline'=>'pending'])}}" class="nav-link {{url()->current() == route('admin.events.pipeline', ['pipeline'=>'pending']) ? 'active': ''}}">
                                    <i class="fa fa-minus"></i> Inactive
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.events.pipeline', ['pipeline'=>'active'])}}" class="nav-link {{url()->current() == route('admin.events.pipeline', ['pipeline'=>'active']) ? 'active': ''}}">
                                    <i class="fa fa-minus" aria-hidden="true"></i> Active
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.events.expired')}}" class="nav-link {{url()->current() == route('admin.events.expired') ? 'active': ''}}">
                                   <i class="fa fa-minus" aria-hidden="true"></i> Expired
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.event.report')}}" class="nav-link {{url()->current() == route('admin.event.report') ? 'active': ''}}">
                                   <i class="fa fa-minus" aria-hidden="true"></i> Reports
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if(auth()->user()->role_id == 125 )
                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-user"></i> Staff <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{route('admin.staff.index')}}" class="nav-link {{url()->current() == route('admin.staff.index') ? 'active': ''}}">
                                   <i class="fa fa-minus" aria-hidden="true"></i> All Staff
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.staff.create')}}" class="nav-link {{url()->current() == route('admin.staff.create') ? 'active': ''}}">
                                   <i class="fa fa-minus" aria-hidden="true"></i> Create New
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    @if(auth()->user()->role_id == 125 || (auth()->user()->staff && in_array('verification', auth()->user()->staff->access)))
                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-user"></i> Verification Requests <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{route('admin.verification.index')}}" class="nav-link {{url()->current() == route('admin.verification.index') ? 'active': ''}}">
                                   <i class="fa fa-minus" aria-hidden="true"></i> All
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.verification.status', 'pending')}}" class="nav-link {{url()->current() == route('admin.verification.status', 'pending') ? 'active': ''}}">
                                   <i class="fa fa-minus" aria-hidden="true"></i> Pending
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.verification.status', 'approved')}}" class="nav-link {{url()->current() == route('admin.verification.status', 'approved') ? 'active': ''}}">
                                   <i class="fa fa-minus" aria-hidden="true"></i> Approved
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    @if((auth()->user()->role_id == 125) || (auth()->user()->staff && in_array('giveaway', auth()->user()->staff->access)))
                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-basket"></i> Cash Giveaways <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{route('admin.giveaway.index')}}" class="nav-link {{url()->current() == route('admin.giveaway.index') ? 'active': ''}}">
                                   <i class="fa fa-minus" aria-hidden="true"></i> All
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.giveaway.active')}}" class="nav-link {{url()->current() == route('admin.giveaway.active') ? 'active': ''}}">
                                   <i class="fa fa-minus" aria-hidden="true"></i> Active
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="fa fa-users"></i> Users <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{route('admin.user.index')}}" class="nav-link {{url()->current() == route('admin.user.index') ? 'active': ''}}">
                                   <i class="fa fa-minus" aria-hidden="true"></i> All Users
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.user.verified')}}" class="nav-link {{url()->current() == route('admin.user.verified') ? 'active': ''}}">
                                   <i class="fa fa-minus" aria-hidden="true"></i> Verified
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.user.pending')}}" class="nav-link {{url()->current() == route('admin.user.pending') ? 'active': ''}}">
                                   <i class="fa fa-minus" aria-hidden="true"></i> Unverified
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('admin.user.report')}}" class="nav-link {{url()->current() == route('admin.user.report') ? 'active': ''}}">
                                   <i class="fa fa-dashboard" aria-hidden="true"></i> Reports
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
