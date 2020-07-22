{{-- Mobile mene start --}}

<div class="menu-mobile menu-activated-on-click color-scheme-dark">
    <div class="mm-logo-buttons-w">
    <a class="mm-logo" href="{{route('home')}}"><img src="{{asset('admin/img/logo.png')}}"><span>পরিবহন</span></a>
      <div class="mm-buttons">
        <div class="mobile-menu-trigger">
          <div class="os-icon os-icon-hamburger-menu-1"></div>
        </div>
      </div>
    </div>
    <div class="menu-and-user">
      <div class="logged-user-w">
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
      <!--------------------
      START - Mobile Menu List
      -------------------->
      <ul class="main-menu">
        <li class="has-sub-menu">
          <a href="index.html">
            <div class="icon-w">
              <div class="os-icon os-icon-layout"></div>
            </div>
            <span>ড্যাশবোর্ড</span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="{{route('home')}}">মেইন ড্যাশবোর্ড</a>
            </li>
            <li>
              <a href="{{route('chart')}}">চার্ট ড্যাশবোর্ড</a>
            </li>
          </ul>
        </li>
        <li class="has-sub-menu">
          <a href="layouts_menu_top_image.html">
            <div class="icon-w">
              <div class="os-icon os-icon-user"></div>
            </div>
            <span>মালিক পক্ষ</span></a>
          <ul class="sub-menu">
            <li>
              <a href="{{route('owner.create')}}">মালিকের তালিকা দেখুন</a>
            </li>
            <li>
              <a href="{{route('owner.index')}}">মালিক যোগ করুন </a>
            </li>
            <li>
              <a href="{{route('ownerbus.create')}}">মালিকের গাড়ী যোগ করুণ </a>
            </li>
            <li>
              <a href="{{route('ownerbus.index')}}">মালিকের গাড়ীর তালিকা দেখুন</a>
            </li>
            <li>
              <a href="{{route('owneradvance.create')}}">মালিকের অগ্রীম টাকা যোগ করুন </strong></a>
            </li>
            <li>
              <a href="{{route('owneradvance.index')}}">মালিকের অগ্রীম টাকা তালিকা দেখুন</a>
            </li>
          </ul>
        </li>
        <li class="has-sub-menu">
          <a href="apps_bank.html">
            <div class="icon-w">
              <div class="os-icon os-icon-truck"></div>
            </div>
            <span>গাড়ী সমূহের তালিকা</span></a>
          <ul class="sub-menu">
            <li>
              <a href="{{route('bus.index')}}">গাড়ীর তালিকা দেখুন</a>
            </li>
            <li>
              <a href="{{route('bus.create')}}">নতুন গাড়ি যোগ করুন</a>
            </li>
          </ul>
        </li>
        <li class="has-sub-menu">
          <a href="index.html">
            <div class="icon-w">
              <div class="os-icon os-icon-home-34"></div>
            </div>
            <span>কাউন্টার & চেকপোস্ট</span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="{{route('counter.index')}}">কাউন্টারসমূহের তালিকা দেখুন </a>
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
        </li>
        <li class="has-sub-menu">
          <a href="#">
            <div class="icon-w">
              <div class="os-icon os-icon-users"></div>
            </div>
            <span>গাড়ীর কর্মচারীর তালিকা</span></a>
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
        </li>
        <li class="has-sub-menu">
          <a href="#">
            <div class="icon-w">
              <div class="os-icon os-icon-truck"></div>
            </div>
            <span>আজকের গাড়ীর তালিকা</span></a>
          <ul class="sub-menu">
            <li>
              <a href="{{route('driverhelper.index')}}">আজকের গাড়ীর ড্রাইভার এবং হেল্পার যোগ করুন </a>
            </li>
            <li>
              <a href="{{route('driverhelper.create')}}">আজকের গাড়ীর ড্রাইভার এবং হেল্পার তালিকা</a>
            </li>
            <li>
              <a href="{{route('all-driverhelper')}}">সর্বমোট গাড়ীর ড্রাইভার এবং হেল্পার তালিকা দেখুন</a>
            </li>
            <li>
              <a href="{{route('todaycheck.index')}}">আজকের গাড়ীর চেকার যোগ করুন</a>
            </li>
            <li>
              <a href="{{route('todaycheck.create')}}">আজকের গাড়ীর চেকারের তালিকা দেখুন</a>
            </li>
            <li>
              <a href="{{route('todayall-info')}}">সর্বমোট  গাড়ীর চেকারের তালিকা দেখুন</a>
            </li>
            <li>
            <a href="{{route('cartrip.index')}}">আজকের গাড়ীর ট্রিপলিস্টের তালিকা যুক্ত করুন </a>
            </li>
            <li>
              <a href="{{route('cartrip.create')}}">আজকের গাড়ীর ট্রিপলিস্টের তালিকা দেখুন</a>
            </li>
            <li>
              <a href="{{route('cartripall')}}">সর্বমোট গাড়ীর ট্রিপলিস্টের তালিকা দেখুন</a>
            </li>
          </ul>
        </li>
        <li class="has-sub-menu">
          <a href="#">
            <div class="icon-w">
              <div class="os-icon os-icon-file-plus"></div>
            </div>
            <span>আয় সমূহের তালিকা</span></a>
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
        </li>
        <li class="has-sub-menu">
          <a href="apps_bank.html">
            <div class="icon-w">
              <div class="os-icon os-icon-truck"></div>
            </div>
            <span>প্রতিটি গাড়ীর আয় হিসাব</span></a>
          <ul class="sub-menu">
            <li>
              <a href="{{route('eachbusincome.index')}}">প্রতিটি গাড়ীর আয় যোগ করুন</a>
            </li>
            <li>
              <a href="{{route('eachbusincome.create')}}">আজকের প্রতিটি গাড়ীর আয়</a>
            </li>
            <li>
              <a href="{{route('weekeach')}}">এ সপ্তাহে প্রতিটি গাড়ীর আয়</a>
            </li>
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
        </li>
        <li class="has-sub-menu">
          <a href="#">
            <div class="icon-w">
              <div class="os-icon os-icon-grid"></div>
            </div>
            <span>আয় সমূহ </span></a>
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
        </li>
        <li class="has-sub-menu">
          <a href="#">
            <div class="icon-w">
              <div class="os-icon os-icon-file-text"></div>
            </div>
            <span>খরচ সমূহের তালিকা</span></a>
          <ul class="sub-menu">
            <li>
              <a href="{{route('costlist.create')}}">গাড়ীর খরচের তালিকা যোগ করুন</a>
            </li>
            <li>
              <a href="{{route('costlist.index')}}">গাড়ীর খরচের তালিকা দেখুন</a>
            </li>
            <li>
              <a href="{{route('countercostlist.create')}}">কাউন্টার খরচের তালিকা যোগ করুন</a>
            </li>
            <li>
              <a href="{{route('countercostlist.index')}}">কাউন্টার খরচের তালিকা দেখুন</a>
            </li>
            <li>
              <a href="{{route('costadd.create')}}">আজকে গাড়ীর খরচ সমূহ যোগ করুন</a>
            </li>
            <li>
              <a href="{{route('costadd.index')}}">আজকে গাড়ীর খরচ সমূহের তালিকা দেখুন</a>
            </li>
            <li>
              <a href="{{route('costadd-all-info')}}">সর্বমোট গাড়ীর খরচ সমূহের তালিকা দেখুন</a>
            </li>
            <li>
              <a href="{{route('countercostadd.create')}}">আজকের কাউন্টার খরচ সমূহ যোগ করুন</a>
            </li>
            <li>
              <a href="{{route('countercostadd.index')}}">আজকের কাউন্টার খরচ সমূহের তালিকা দেখুন</a>
            </li>
            <li>
              <a href="{{route('countercostadd-all')}}">সর্বমোট কাউন্টার খরচ সমূহের তালিকা দেখুন</a>
            </li>
            <li>
              <a href="{{route('gpcost.create')}}">জিপি খরচ যোগ করুন</a>
            </li>
            <li>
              <a href="{{route('gpcost.index')}}">আজকের জিপি খরচ সমূহের তালিকা দেখুন</a>
            </li>
            <li>
              <a href="{{route('gpcost-all')}}">সর্বমোট জিপি খরচ সমূহের তালিকা দেখুন</a>
            </li>
          </ul>
        </li>
        {{-- <li class="has-sub-menu">
          <a href="#">
            <div class="icon-w">
              <div class="os-icon os-icon-wallet-loaded"></div>
            </div>
            <span>কর্মচারী বেতন বাবদ খরচ</span></a>
          <ul class="sub-menu">
            <li>
              <a href="{{route('countermansalary.create')}}">কাউন্টারম্যানের বেতনের তালিকা যোগ করুন</a>
            </li>
            <li>
            <a href="{{route('countermansalary.index')}}">কাউন্টারম্যানের বেতনের তালিকা দেখুন</a>
            </li>
            <li>
            <a href="{{route('csall-info')}}">সর্বমোট কাউন্টারম্যানের বেতনের তালিকা দেখুন</a>
            </li>
            <li>
            <a href="{{route('driversalary.create')}}">ড্রাইভারের বেতনের তালিকা যোগ করুন</a>
            </li>
            <li>
            <a href="{{route('driversalary.index')}}">ড্রাইভারের বেতনের তালিকা দেখুন</a>
            </li>
            <li>
              <a href="{{route('all-info')}}">সর্বমোট ড্রাইভারের বেতনের তালিকা দেখুন</a>
            </li>
            <li>
              <a href="{{route('helpersalary.create')}}">হেল্পারের বেতনের তালিকা যোগ করুন </a>
              </li>
            <li>
              <a href="{{route('helpersalary.index')}}">হেল্পারের বেতনের তালিকা দেখুন</a>
            </li>
            <li>
              <a href="{{route('hsall-info')}}">সর্বমোট হেল্পারের বেতনের তালিকা দেখুন</a>
            </li>
            <li>
              <a href="{{route('linemansalary.create')}}">চেকারের  বেতনের তালিকা যোগ করুন</a>
            </li>
            <li>
              <a href="{{route('linemansalary.index')}}">চেকারের  বেতনের তালিকা দেখুন </a>
            </li>
            <li>
              <a href="{{route('lsall-info')}}">সর্বমোট চেকারের  বেতনের তালিকা দেখুন</a>
            </li> 
          </ul>
        </li> --}}
        
        <li class="has-sub-menu">
          <a href="#">
            <div class="icon-w">
              <div class="os-icon os-icon-agenda-1"></div>
            </div>
            <span>খরচ সমূহ</span></a>
          <ul class="sub-menu">
            <li>
              <a href="{{route('today1')}}">আজকের মোট খরচ</a>
            </li>
            <li>
              <a href="{{route('week1')}}">এ সপ্তায়ে মোট খরচ</a>
            </li>
            <li>
              <a href="{{route('month1')}}">এ মাসের মোট খরচ</a>
            </li>
            <li>
              <a href="{{route('year1')}}">এ বছরের মোট খরচ</a>
            </li>
            <li>
              <a href="{{route('total1')}}">সর্বমোট  খরচ</a>
            </li>
            <li>
              <a href="{{route('today-all')}}">আজকের মোট খরচ তালিকা</a>
            </li>
            <li>
              <a href="{{route('week-all')}}">এ সপ্তায়ে মোট খরচের  তালিকা</a>
            </li>
            <li>
              <a href="{{route('month-all')}}">এ মাসের মোট খরচের  তালিকা</a>
            </li>
            <li>
              <a href="{{route('year-all')}}">এ বছরের মোট খরচের  তালিকা</a>
            </li>
            <li>
              <a href="{{route('total-all')}}">সর্বমোট খরচের  তালিকা</a>
            </li>
          </ul>
        </li>
        <li class="has-sub-menu">
          <a href="apps_bank.html">
            <div class="icon-w">
              <div class="os-icon os-icon-coins-4"></div>
            </div>
            <span>লাভ সমূহ</span></a>
          <ul class="sub-menu">
            <li>
              <a href="{{route('todayprofit')}}">মোট লাভ তালিকা</a>
            </li>
          </ul>
        </li>
        <li class="has-sub-menu">
          <a href="apps_bank.html">
            <div class="icon-w">
              <div class="os-icon os-icon-cv-2"></div>
            </div>
            <span>কাউন্টার ইনফর্মেশন</span></a>
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
        </li>
        

        <li class="has-sub-menu">
          <a href="apps_bank.html">
            <div class="icon-w">
              <div class="os-icon os-icon-user"></div>
            </div>
            <span>মালিকের দৈনিক হিসাব</span></a>
          <ul class="sub-menu">
            <li>
              <a href="{{route('sms.sendsms')}}">এস.এম.এস এর জন্য মালিক এর ইনফর্মেশন দিন</a>
            </li>
          </ul>
        </li>
        <li class="has-sub-menu">
          <a href="apps_bank.html">
            <div class="icon-w">
              <div class="os-icon os-icon-mail-14"></div>
            </div>
            <span>বার্তা বা মেসেজ পাঠান</span></a>
          <ul class="sub-menu">
            <li>
              <a href="{{ route('ownermsg') }}">মালিকের কাছে মেসেজ পাঠান</a>
            </li>
            <li>
              <a href="{{route('drivermsg')}}">ড্রাইভারের কাছে মেসেজ পাঠান</a>
            </li>
            <li>
              <a href="{{ route('helpermsg') }}">হেল্পারের কাছে মেসেজ পাঠান</a>
            </li>
            <li>
              <a href="{{ route('countermanmsg') }}">কাউন্টার ম্যানের কাছে</a>
            </li>
          </ul>
        </li>
        <li class="has-sub-menu">
          <a href="apps_bank.html">
            <div class="icon-w">
              <div class="os-icon os-icon-file-text"></div>
            </div>
            <span>রিপোর্ট সমূহ </span></a>
          <ul class="sub-menu">
            <li>
              <a href="{{ route('daydriver') }}">আজকের ড্রাইভারের বেতন</a>
            </li>
            <li>
              <a href="{{ route('weekdriver') }}"> এই সপ্তাহের ড্রাইভারের বেতন</a>
            </li>
            <li>
              <a href="{{ route('monthdriverreport') }}">এই মাসের ড্রাইভারের বেতন</a>
            </li>
            <li>
              <a href="{{ route('dayhelper') }}">আজকের হেল্পার বেতন</a>
            </li>
            <li>
              <a href="{{ route('weekhelper') }}">এই সপ্তাহের হেল্পার বেতন</a>
            </li>
            <li>
              <a href="{{ route('monthhelper') }}">এই মাসের হেল্পার বেতন</a>
            </li>
            <li>
              <a href="{{ route('daylineman') }}">আজকের লাইনম্যান বেতন</a>
            </li>
            <li>
              <a href="{{ route('weeklineman') }}">এই সপ্তাহের লাইনম্যান বেতন</a>
            </li>
            <li>
              <a href="{{ route('monthlineman') }}"> এই মাসের লাইনম্যান বেতন</a>
            </li>
            <li>
              <a href="{{ route('daycounterman') }}">আজকের কউন্টারম্যান বেতন</a>
            </li>
            <li>
              <a href="{{ route('weekcounterman') }}"> এই সপ্তাহের কউন্টারম্যান বেতন</a>
            </li>
            <li>
              <a href="{{ route('monthcounterman') }}">এই মাসের কউন্টারম্যান বেতন</a>
            </li>
            <li>
              <a href="{{ route('monthincomereport') }}">এই মাসের আয়ের রিপোর্ট</a>
            </li>
            <li>
              <a href="{{ route('monthkhorochreport') }}">এই মাসের ব্যয়ের রিপোর্ট</a>
            </li>
          </ul>
        </li>
        <li class="has-sub-menu">
          <a href="apps_bank.html">
            <div class="icon-w">
              <div class="os-icon os-icon-user-plus"></div>
            </div>
            <span>একাউন্ট  খুলুন</span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="{{route('register')}}">নতুন একাউন্ট  খুলুন</a>
            </li>
          </ul>
        </li>
      </ul>
      <!--------------------
      END - Mobile Menu List
      -------------------->
    </div>
  </div>
  {{-- mobile menu end --}}