
  {{-- main menu start --}}
  <div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
    <div class="logo-w">
    <a class="logo" href="{{route('home')}}">
        <div class="logo-element"></div>
        <div class="logo-label">
          পরিবহন
        </div>
      </a>
    </div>
    <div class="logged-user-w avatar-inline">
      <div class="logged-user-i">
        <div class="avatar-w">
        <img alt="" src="{{asset('admin/img/user.png')}}">
        </div>
        <div class="logged-user-info-w">
          <div class="logged-user-name">
            {{Auth::user()->name}}
          </div>
          <div class="logged-user-role">
            {{Auth::user()->name}}
          </div>
        </div>
        <div class="logged-user-toggler-arrow">
          <div class="os-icon os-icon-chevron-down"></div>
        </div>
        <div class="logged-user-menu color-style-bright">
          <div class="logged-user-avatar-info">
            <div class="avatar-w">
            <img alt="" src="{{asset('admin/img/user.png')}}">
            </div>
            <div class="logged-user-info-w">
              <div class="logged-user-name">
                {{Auth::user()->name}}
              </div>
              <div class="logged-user-role">
                {{Auth::user()->name}}
              </div>
            </div>
          </div>
          <div class="bg-icon">
            <i class="os-icon os-icon-wallet-loaded"></i>
          </div>
          <ul>
            {{-- <li>
              <a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a>
            </li> --}}
            {{-- <li>
              <a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
            </li> --}}
            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <h1 class="menu-page-header">
      Page Header
    </h1>
    <ul class="main-menu">
      <li class="selected has-sub-menu">
        <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-layout"></div>
          </div>
          <span>ড্যাশবোর্ড</span>
        </a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            ড্যাশবোর্ড
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-layout"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{route('home')}}">মেইন ড্যাশবোর্ড</a>
              </li>
              <li>
                <a href="{{route('chart')}}">চার্ট ড্যাশবোর্ড</a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class=" has-sub-menu">
      <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-user"></div>
          </div>
          <span>মালিক পক্ষ</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            মালিক পক্ষ
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-user"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{route('owner.create')}}">মালিকের তালিকা দেখুন</a>
              </li>
              <li>
                <a href="{{route('owner.index')}}">নতুন মালিক যোগ করুন </a>
              </li>
              <li>
                <a href="{{route('ownerbus.create')}}">মালিকের গাড়ী যোগ  করুন </a>
              </li>
            </ul>
            <ul class="sub-menu">
              <li>
                <a href="{{route('ownerbus.index')}}">মালিকের গাড়ীর তালিকা দেখুন</a>
              </li>
              <li>
                <a href="{{route('owneradvance.create')}}">মালিকের অগ্রীম  টাকা যোগ করুন </strong></a>
              </li>
              <li>
                <a href="{{route('owneradvance.index')}}">মালিকের অগ্রীম টাকা তালিকা দেখুন</a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class=" has-sub-menu">
        <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-truck"></div>
          </div>
          <span>গাড়ীসমূহের তালিকা</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            গাড়ীসমূহের তালিকা
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-truck"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{route('bus.index')}}">গাড়ীর তালিকা দেখুন</a>
              </li>
              <li>
                <a href="{{route('bus.create')}}">নতুন গাড়ি যোগ করুন</a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class=" has-sub-menu">
        <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-home-34"></div>
          </div>
          <span>কাউন্টার & চেকপোস্ট</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            কাউন্টার & চেকপোস্ট
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-home-34"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{route('counter.index')}}">কাউন্টার সমূহের তালিকা দেখুন </a>
              </li>
              <li>
                <a href="{{route('counter.create')}}">নতুন কাউন্টার যোগ করুন </a>
              </li>
              <li>
                <a href="{{route('checkpost.index')}}">চেকপোস্টের তালিকা দেখুন</a>
              </li>
              <li>
                <a href="{{route('checkpost.create')}}">নতুন চেকপোস্ট যোগ করুন</a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class=" has-sub-menu">
      <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-users"></div>
          </div>
          <span>গাড়ীর কর্মচারীর তালিকা  </span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            গাড়ীর কর্মচারীর তালিকা
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-users"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{route('driver.create')}}">ড্রাইভারের তালিকা দেখুন</strong></a>
              </li>
              <li>
                <a href="{{route('driver.index')}}">নতুন ড্রাইভার যোগ করুন</a>
              </li>
              <li>
                <a href="{{route('helper.create')}}">হেল্পারের তালিকা দেখুন</a>
              </li>
              <li>
                <a href="{{route('helper.index')}}">নতুন হেল্পার যোগ করুন</a>
              </li>
              </ul><ul class="sub-menu">
              <li>
                <a href="{{route('checker.create')}}">চেকারের তালিকা দেখুন</a>
              </li>
              <li>
                <a href="{{route('checker.index')}}">নতুন চেকার যোগ করুন</a>
              </li>

              <li>
                <a href="{{route('counterman.create')}}">কাউন্টারম্যানের তালিকা দেখুন </a>
              </li>
              <li>
                <a href="{{route('counterman.index')}}">কাউন্টারম্যান যোগ করুন</a>
              </li>

            </ul>
          </div>
        </div>
      </li>
      <li class=" has-sub-menu">
      <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-truck"></div>
          </div>
          <span>আজকের গাড়ীর তালিকা</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            আজকের গাড়ীর তালিকা
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-truck"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{route('driverhelper.create')}}">আজকের গাড়ীর ড্রাইভার এবং হেল্পার তালিকা</a>
              </li>
              <li>
                <a href="{{route('driverhelper.index')}}">আজকের গাড়ীর ড্রাইভার এবং হেল্পার যোগ করুন </a>
              </li>
              <li>
                <a href="{{route('all-driverhelper')}}">সর্বমোট গাড়ীর ড্রাইভার এবং হেল্পার তালিকা দেখুন</a>
              </li>
              <li>
                <a href="{{route('todaycheck.create')}}">আজকের গাড়ীর চেকারের তালিকা দেখুন</a>
              </li>
              <li>
                <a href="{{route('todaycheck.index')}}">আজকের গাড়ীর চেকার যোগ করুন</a>
              </li>
              </ul><ul class="sub-menu">
              <li>
                <a href="{{route('todayall-info')}}">সর্বমোট গাড়ীর চেকারের তালিকা দেখুন</a>
              </li>
              <li>
                <a href="{{route('cartrip.create')}}">আজকের গাড়ীর ট্রিপ লিস্টের তালিকা দেখুন</a>
              </li>
              <li>
                <a href="{{route('cartrip.index')}}">আজকের গাড়ীর ট্রিপ লিস্টের তালিকা যুক্ত করুন </a>
              </li>
              <li>
                <a href="{{route('cartripall')}}">সর্বমোট গাড়ীর ট্রিপ লিস্টের তালিকা দেখুন</a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class=" has-sub-menu">
      <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-file-plus"></div>
          </div>
          <span>আয় সমূহের তালিকা</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            আয় সমূহের তালিকা
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-file-plus"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{route('allearn.create')}}">আজকে সকল আয়ের তালিকা পূরণ করুন </a>
              </li>
              <li>
                <a href="{{route('allearn.index')}}">আজকে সকল আয়ের তালিকা দেখুন</a>
              </li>
              <li>
                <a href="{{route('all-earn-list')}}">সর্বমোট আয়ের তালিকা দেখুন</a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class=" has-sub-menu">
      <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-truck"></div>
          </div>
          <span>প্রতিটি গাড়ীর আয় হিসাব</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            প্রতিটি গাড়ীর আয় হিসাব
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-truck"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{route('eachbusincome.index')}}">প্রতিটি গাড়ীর আয় যোগ করুন</a>
              </li>
              <li>
                <a href="{{route('eachbusincome.create')}}">আজকের প্রতিটি গাড়ীর আয়</a>
              </li>
              <li>
                <a href="{{route('weekeach')}}">এ সপ্তাহের প্রতিটি গাড়ীর আয়</a>
              </li>

            </ul>
            <ul class="sub-menu">
              <li>
                <a href="{{route('montheach')}}">এ মাসের প্রতিটি গাড়ীর আয়</a>
              </li>
              <li>
                <a href="{{route('yeareach')}}">এ বছরের প্রতিটি গাড়ীর আয়</a>
              </li>
              <li>
                <a href="{{route('totaleach')}}">সর্বমোট প্রতিটি গাড়ীর আয়</a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class=" has-sub-menu">
      <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-grid"></div>
          </div>
          <span>আয় সমূহ </span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            আয় সমূহ
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-grid"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
              <a href="{{route('today')}}">আজকের মোট আয়</a>
              </li>
              <li>
                <a href="{{route('week')}}">এ সপ্তাহের মোট আয়</a>
              </li>
              <li>
                <a href="{{route('month')}}">এ মাসের মোট আয়</a>
              </li>
              <li>
                <a href="{{route('year')}}">এ বছরের মোট আয়</a>
              </li>
              <li>
                <a href="{{route('total')}}">সর্বমোট মোট আয়</a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class=" has-sub-menu">
        <a href="">
            <div class="icon-w">
              <div class="os-icon os-icon-file-text"></div>
            </div>
            <span>খরচ সমূহের তালিকা</span></a>
          <div class="sub-menu-w">
            <div class="sub-menu-header">
              খরচ সমূহের তালিকা
            </div>
            <div class="sub-menu-icon">
              <i class="os-icon os-icon-file-text"></i>
            </div>
            <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{route('costlist.create')}}">গাড়ীর  খরচের তালিকা তৈরি  করুন</a>
              </li>
              <li>
                <a href="{{route('countercostlist.create')}}">কাউন্টার  খরচের তালিকা তৈরি  করুন</a>
              </li>
              <li>
                <a href="{{route('allbuscost.create')}}">গাড়ীর সকল খরচ  যোগ করুন </a>
              </li>
              <li>
                <a href="{{route('allbuscost.index')}}">আজকে গাড়ি  থেকে খরচ এর তালিক  দেখুন </a>
              </li>
              <li>
                <a href="{{route('allbuscostshow')}}">সর্বমোট  গাড়ি  থেকে খরচ এর তালিক  দেখুন </a>
              </li>
              <li>
                <a href="{{route('allcountercost.create')}}">কাউন্টার সকল খরচ  যোগ করুন </a>
              </li>
              <li>
                <a href="{{route('allcountercost.index')}}">আজকে কাউন্টার  থেকে খরচ এর তালিক  দেখুন </a>
              </li>
              <li>
                <a href="{{route('allcountercostshow')}}">সর্বমোট  কাউন্টার  থেকে খরচ এর তালিক  দেখুন </a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class=" has-sub-menu">
      <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-agenda-1"></div>
          </div>
          <span>খরচ সমূহ</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            খরচ সমূহ
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-agenda-1"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{route('today1')}}">আজকের মোট খরচ</a>
              </li>
              <li>
                <a href="{{route('week1')}}">এ সপ্তাহের মোট খরচ</a>
              </li>
              <li>
                <a href="{{route('month1')}}">এ মাসের মোট খরচ</a>
              </li>
              <li>
                <a href="{{route('year1')}}">এ বছরের মোট খরচ</a>
              </li>
              <li>
                <a href="{{route('total1')}}">সর্বমোট খরচ</a>
              </li>
              </ul>
              <ul class="sub-menu">
              <li>
                <a href="{{route('today-all')}}">আজকের মোট খরচ তালিকা</a>
              </li>
              <li>
                <a href="{{route('week-all')}}">এ সপ্তাহের মোট খরচের তালিকা</a>
              </li>
              <li>
                <a href="{{route('month-all')}}">এ মাসের মোট খরচের তালিকা</a>
              </li>
              <li>
                <a href="{{route('year-all')}}">এ বছরের মোট খরচের তালিকা</a>
              </li>
              <li>
                <a href="{{route('total-all')}}">সর্বমোট খরচের তালিকা</a>
              </li>
              </ul>
          </div>
        </div>
      </li>
      <li class=" has-sub-menu">
        <a href="">
            <div class="icon-w">
              <div class="os-icon os-icon-coins-4"></div>
            </div>
            <span>লাভ সমূহ</span></a>
          <div class="sub-menu-w">
            <div class="sub-menu-header">
              লাভ সমূহ
            </div>
            <div class="sub-menu-icon">
              <i class="os-icon os-icon-coins-4"></i>
            </div>
            <div class="sub-menu-i">
              <ul class="sub-menu">
                <li>
                  <a href="{{route('todayprofit')}}">মোট লাভের তালিকা</a>
                </li>
              </ul>
            </div>
          </div>
      </li>
      <li class=" has-sub-menu">
      <a href="">
          <div class="icon-w">
            <div class="os-icon os-icon-cv-2"></div>
          </div>
          <span>কাউন্টার ইনফর্মেশন</span></a>
        <div class="sub-menu-w">
          <div class="sub-menu-header">
            কাউন্টার ইনফর্মেশন
          </div>
          <div class="sub-menu-icon">
            <i class="os-icon os-icon-cv-2"></i>
          </div>
          <div class="sub-menu-i">
            <ul class="sub-menu">
              <li>
                <a href="{{route('today2')}}">আজকের কাউন্টার ইনফর্মেশন</a>
              </li>
              <li>
                <a href="{{route('week2')}}">এ সপ্তাহের কাউন্টার ইনফর্মেশন</a>
              </li>
              <li>
                <a href="{{route('month2')}}">এ মাসের কাউন্টার ইনফর্মেশন</a>
              </li>
              <li>
                <a href="{{route('year2')}}">এই বছরের কাউন্টার ইনফর্মেশন</a>
              </li>
              <li>
                <a href="{{route('total2')}}">সর্বমোট কাউন্টার ইনফর্মেশন</a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class=" has-sub-menu">
        <a href="">
            <div class="icon-w">
              <div class="os-icon os-icon-user"></div>
            </div>
            <span>মালিকের দৈনিক হিসাব</span></a>
          <div class="sub-menu-w">
            <div class="sub-menu-header">
              মালিকের দৈনিক হিসাব
            </div>
            <div class="sub-menu-icon">
              <i class="os-icon os-icon-user"></i>
            </div>
            <div class="sub-menu-i">
              <ul class="sub-menu">
                <li>
                  <a href="{{route('sms.sendsms')}}">এস.এম.এস এর জন্য মালিক এর ইনফর্মেশন দিন</a>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <li class=" has-sub-menu">
          <a href="">
              <div class="icon-w">
                <div class="os-icon os-icon-mail-14"></div>
              </div>
              <span>বার্তা বা মেসেজ পাঠান</span></a>
            <div class="sub-menu-w">
              <div class="sub-menu-header">
                বার্তা বা মেসেজ পাঠান
              </div>
              <div class="sub-menu-icon">
                <i class="os-icon os-icon-mail-14"></i>
              </div>
              <div class="sub-menu-i">
                <ul class="sub-menu">
                  <li>
                    <a href="{{ route('ownermsg') }}">মালিকের কাছে মেসেজ পাঠান</a>
                  </li>
                  <li>
                    <a href="{{route('drivermsg')}}">ড্রাইভারের কাছে মেসেজ পাঠান</a>
                  </li>
                  <li>
                    <a href="{{ route('helpermsg') }}">হেল্পারের  কাছে  মেসেজ পাঠান</a>
                  </li>
                  <li>
                    <a href="{{ route('countermanmsg') }}">কাউন্টারম্যানের কাছে মেসেজ পাঠান</a>
                  </li>
                </ul>
              </div>
          </div>
        </li>
        <li class=" has-sub-menu">
          <a href="">
              <div class="icon-w">
                <div class="os-icon os-icon-file-text"></div>
              </div>
              <span>রিপোর্ট সমূহ </span></a>
            <div class="sub-menu-w">
              <div class="sub-menu-header">
                রিপোর্ট সমূহ
              </div>
              <div class="sub-menu-icon">
                <i class="os-icon os-icon-zap"></i>
              </div>
              <div class="sub-menu-i">
                <ul class="sub-menu">
                  <li>
                    <a href="{{ route('daydriver') }}" target="_blanck">আজকের ড্রাইভারের বেতন</a>
                  </li>
                  <li>
                    <a href="{{ route('weekdriver') }}" target="_blanck"> এই সপ্তাহের ড্রাইভারের বেতন</a>
                  </li>
                  <li>
                    <a href="{{ route('monthdriverreport') }}" target="_blanck">এই মাসের ড্রাইভারের বেতন</a>
                  </li>
                  <li>
                    <a href="{{ route('dayhelper') }}" target="_blanck">আজকের হেল্পার বেতন</a>
                  </li>
                  <li>
                    <a href="{{ route('weekhelper') }}" target="_blanck">এই সপ্তাহের হেল্পার বেতন</a>
                  </li>
                </ul>
                <ul class="sub-menu">
                  <li>
                    <a href="{{ route('monthhelper') }}" target="_blanck">এই মাসের হেল্পার বেতন</a>
                  </li>
                  <li>
                    <a href="{{ route('daylineman') }}" target="_blanck">আজকের লাইনম্যান বেতন</a>
                  </li>
                  <li>
                    <a href="{{ route('weeklineman') }}" target="_blanck">এই সপ্তাহের লাইনম্যান বেতন</a>
                  </li>
                  <li>
                    <a href="{{ route('monthlineman') }}" target="_blanck"> এই মাসের লাইনম্যান বেতন</a>
                  </li>
                  <li>
                    <a href="{{ route('daycounterman') }}" target="_blanck">আজকের কউন্টারম্যান বেতন</a>
                  </li>
                </ul>
                <ul class="sub-menu">
                  <li>
                    <a href="{{ route('weekcounterman') }}" target="_blanck"> এই সপ্তাহের কউন্টারম্যান বেতন</a>
                  </li>
                  <li>
                    <a href="{{ route('monthcounterman') }}" target="_blanck">এই মাসের কউন্টারম্যান বেতন</a>
                  </li>
                  <li>
                    <a href="{{ route('monthincomereport') }}" target="_blanck">এই মাসের আয়ের রিপোর্ট</a>
                  </li>
                  <li>
                    <a href="{{ route('monthkhorochreport') }}" target="_blanck">এই মাসের ব্যয়ের রিপোর্ট</a>
                  </li>
                </ul>
              </div>
          </div>
        </li>
        <li class=" has-sub-menu">
          <a href="">
              <div class="icon-w">
                <div class="os-icon os-icon-user-plus"></div>
              </div>
              <span>একাউন্ট খুলুন</span></a>
            <div class="sub-menu-w">
              <div class="sub-menu-header">
                 একাউন্ট খুলুন
              </div>
              <div class="sub-menu-icon">
                <i class="os-icon os-icon-zap"></i>
              </div>
              <div class="sub-menu-i">
                <ul class="sub-menu">
                  <li>
                    <a href="{{route('register')}}">নতুন একাউন্ট খুলুন</a>
                  </li>
                </ul>
              </div>
            </div>
        </li>
    </ul>
  </div>
  {{-- main menu end --}}
