﻿#pragma checksum "..\..\..\Users\ViewUsers.xaml" "{8829d00f-11b8-4213-878b-770e8597ac16}" "D15FBF357F1CBC7F284C62899F1070F2BCBBDA6680A03A74050EA60338A2E9DF"
//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated by a tool.
//     Runtime Version:4.0.30319.42000
//
//     Changes to this file may cause incorrect behavior and will be lost if
//     the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

using System;
using System.Diagnostics;
using System.Windows;
using System.Windows.Automation;
using System.Windows.Controls;
using System.Windows.Controls.Primitives;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Ink;
using System.Windows.Input;
using System.Windows.Markup;
using System.Windows.Media;
using System.Windows.Media.Animation;
using System.Windows.Media.Effects;
using System.Windows.Media.Imaging;
using System.Windows.Media.Media3D;
using System.Windows.Media.TextFormatting;
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Windows.Shell;
using stonkspizza.Users;


namespace stonkspizza.Users {
    
    
    /// <summary>
    /// ViewUsers
    /// </summary>
    public partial class ViewUsers : System.Windows.Window, System.Windows.Markup.IComponentConnector {
        
        
        #line 22 "..\..\..\Users\ViewUsers.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.ListView LvUsers;
        
        #line default
        #line hidden
        
        
        #line 65 "..\..\..\Users\ViewUsers.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.ListView LvUsersrole;
        
        #line default
        #line hidden
        
        
        #line 79 "..\..\..\Users\ViewUsers.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button deleteRole;
        
        #line default
        #line hidden
        
        private bool _contentLoaded;
        
        /// <summary>
        /// InitializeComponent
        /// </summary>
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "4.0.0.0")]
        public void InitializeComponent() {
            if (_contentLoaded) {
                return;
            }
            _contentLoaded = true;
            System.Uri resourceLocater = new System.Uri("/stonkspizza;component/users/viewusers.xaml", System.UriKind.Relative);
            
            #line 1 "..\..\..\Users\ViewUsers.xaml"
            System.Windows.Application.LoadComponent(this, resourceLocater);
            
            #line default
            #line hidden
        }
        
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "4.0.0.0")]
        [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Never)]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Design", "CA1033:InterfaceMethodsShouldBeCallableByChildTypes")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Maintainability", "CA1502:AvoidExcessiveComplexity")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1800:DoNotCastUnnecessarily")]
        void System.Windows.Markup.IComponentConnector.Connect(int connectionId, object target) {
            switch (connectionId)
            {
            case 1:
            this.LvUsers = ((System.Windows.Controls.ListView)(target));
            
            #line 22 "..\..\..\Users\ViewUsers.xaml"
            this.LvUsers.SelectionChanged += new System.Windows.Controls.SelectionChangedEventHandler(this.LvUsers_SelectionChanged);
            
            #line default
            #line hidden
            return;
            case 2:
            
            #line 41 "..\..\..\Users\ViewUsers.xaml"
            ((System.Windows.Controls.Button)(target)).Click += new System.Windows.RoutedEventHandler(this.Button_create);
            
            #line default
            #line hidden
            return;
            case 3:
            
            #line 48 "..\..\..\Users\ViewUsers.xaml"
            ((System.Windows.Controls.Button)(target)).Click += new System.Windows.RoutedEventHandler(this.Button_bewerk);
            
            #line default
            #line hidden
            return;
            case 4:
            
            #line 56 "..\..\..\Users\ViewUsers.xaml"
            ((System.Windows.Controls.Button)(target)).Click += new System.Windows.RoutedEventHandler(this.Button_delete);
            
            #line default
            #line hidden
            return;
            case 5:
            this.LvUsersrole = ((System.Windows.Controls.ListView)(target));
            return;
            case 6:
            this.deleteRole = ((System.Windows.Controls.Button)(target));
            
            #line 79 "..\..\..\Users\ViewUsers.xaml"
            this.deleteRole.Click += new System.Windows.RoutedEventHandler(this.deleteRole_Click);
            
            #line default
            #line hidden
            return;
            case 7:
            
            #line 80 "..\..\..\Users\ViewUsers.xaml"
            ((System.Windows.Controls.Button)(target)).Click += new System.Windows.RoutedEventHandler(this.Button_Click);
            
            #line default
            #line hidden
            return;
            }
            this._contentLoaded = true;
        }
    }
}
